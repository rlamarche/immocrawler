<?php

namespace RL\ImmoCrawlerBundle\Command;

use RL\ImmoCrawlerBundle\Entity\Property;
use RL\ImmoCrawlerBundle\Entity\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\CssSelector\CssSelector;
use Symfony\Component\DomCrawler\Crawler;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Common\Persistence\ObjectManager;
use Goutte\Client;
use \HTMLPurifier;
use \HTMLPurifier_Config;
use \tidy;

class CrawlCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('immo:crawl')
                ->setDescription('Crawl annonces')
                ->addArgument('uri', InputArgument::REQUIRED, 'URI to crawl')
//            ->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
//            ->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
        ;
    }

    protected function request($uri) {
        $ch = curl_init($uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        curl_close($ch);
        /*
          $config = HTMLPurifier_Config::createDefault();
          $purifier = new HTMLPurifier($config);
          $clean_html = $purifier->purify($content);




          $tidy = new tidy;
          $tidy->parseString($content);
          $tidy->cleanRepair();

          $clean_html = (string) $tidy;
         */
        $crawler = new Crawler(null, $uri);
        $crawler->addContent($content, 'text/html');

        return $crawler;
    }

    protected function findByCss(Crawler $crawler, $selector) {
        $ret = $crawler->filter($selector);
        if ($ret->count() > 0) {
            return $ret->text();
        } else {
            return null;
        }
    }
    
    protected function findByXPath(Crawler $crawler, $selector) {
        $ret = $crawler->filterXPath($selector);
        if ($ret->count() > 0) {
            return $ret->text();
        } else {
            return null;
        }
    }
    
    protected function findInTable(Crawler $crawler, $label) {
        $dataCrawler = $crawler->filterXPath("//th[text() = '$label']/../td");
        $data = null;
        if ($dataCrawler->count() > 0) {
            $data = $dataCrawler->text();
        }

        return $data;
    }

    /**
     * 
     * @return ObjectManager
     */
    protected function getManager() {
        return $this->getContainer()->get('doctrine')->getManager();
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        $em = $this->getManager();

        $uri = $input->getArgument('uri');

        $page = $this->request($uri);

        $uris = $page
                ->filter('div.list-lbc > a')
                ->each(function ($node, $i) {
                    $crawler = new Crawler($node);
                    return $crawler->attr('href');
                });

        $uris = array_unique($uris);
        //   print_r($uris);
        foreach ($uris as $uri) {
            $ad = $this->request($uri);

            $title = $this->findByCss($ad, '.lbcContainer h2');
            $description = $this->findByCss($ad, '.content');

            $price = $this->findByCss($ad, 'tr.price > td > span');
            if ($price) {
                $price = preg_replace('/[^0-9]/', '', $price);
            }
            
            $city = $this->findInTable($ad, 'Code postal :');
            $zipcode = $this->findInTable($ad, 'Code postal :');
            $type = $this->findInTable($ad, 'Type de bien : ');
            $rooms = $this->findInTable($ad, 'Pièces : ');
            $area = preg_replace('/(\d+).*/', '\1', $this->findInTable($ad, 'Surface : '));
            
            $ges = $this->findByXPath($ad, "//th[text() = 'GES :']/../td/noscript/a");
            if ($ges) {
                $ges = substr($ges, 0, 1);
            }
            $energyClass = $this->findByXPath($ad, "//th[text() = 'Classe énergie :']/../td/noscript/a");
            if ($energyClass) {
                $energyClass = substr($energyClass, 0, 1);
            }
            
            if ($title) {
                $property = new Property();
                $property->setTitle($title);
                $property->setDescription($description);
                $property->setPrice($price);
                $property->setCity($city);
                $property->setZipcode($zipcode);
                $property->setType($type);
                $property->setRooms($rooms);
                $property->setArea($area);
                
                $property->setPollutionClass($ges);
                $property->setEnergyClass($energyClass);
                
                $property->setProviderType('leboncoin');
                $property->setProviderUrl($uri);
                $property->setProviderId(preg_replace('/\/(\d+)\./', '\1', $uri));
                

                $em->persist($property);
                $em->flush();
            }

            //  echo "$area";
            // echo "\n";
        }

    }

}
