<?php

namespace WhatsTheMusic\Entity;

use Doctrine\Mapping as ORM;

/**
* Quiz Entity
*
* @Entity
* @Table("quiz")
*/
class Quiz
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
	 * @Column(name="name", type="string")
	 * @var  $name string
	 */
	protected $name;

	/**
     * @var $questions \Doctrine\Common\Collections\ArrayCollection
     *
     * @ManyToMany(targetEntity="Question")
     */
	protected $questions;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set name
     *
     * @param string $name
     * @return Quiz
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add questions
     *
     * @param \WhatsTheMusic\Entity\Question $questions
     * @return Quiz
     */
    public function addQuestion(\WhatsTheMusic\Entity\Question $questions)
    {
        $this->questions[] = $questions;
    
        return $this;
    }

    /**
     * Remove questions
     *
     * @param \WhatsTheMusic\Entity\Question $questions
     */
    public function removeQuestion(\WhatsTheMusic\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}