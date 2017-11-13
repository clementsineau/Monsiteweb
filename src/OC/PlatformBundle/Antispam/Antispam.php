<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 14/11/2017
 * Time: 00:36
 */

namespace src\OC\PlatformBundle\Antispam;


class Antispam
{
    private $mailer;
    private $locale;
    private $minLength;

    public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
    {
        $this->mailer    = $mailer;
        $this->locale    = $locale;
        $this->minLength = (int) $minLength;
    }
    /**
     * Vérifie si le texte est un spam
     *
     * @param string $text
     * @return bool
     */
    public function isSpam($text)
    {
        return strlen($text) < $this->minLength;
    }
}