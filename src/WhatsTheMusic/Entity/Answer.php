<?php

namespace WhatsTheMusic\Entity;

use Doctrine\Mapping as ORM;

/**
* Answer Entity
*
* @Entity(repositoryClass="AnswerRepository")
* @Table("answer")
*/
class Answer
{
	/**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
	protected $id;

	/**
	 * @Column(name="text", type="string")
	 * @var  $text string
	 */
	protected $text;

     /**
      * @Column(name="music_id", type="integer")
      * @var $music integer
      */
     protected $music;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Answer
     */
    public function setText($text)
    {
        $this->text = $text;
    
        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set music
     *
     * @param integer $music
     * @return Answer
     */
    public function setMusic($music)
    {
        $this->music = $music;
    
        return $this;
    }

    /**
     * Get music
     *
     * @return integer 
     */
    public function getMusic()
    {
        return $this->music;
    }
}