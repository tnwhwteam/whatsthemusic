<?php

namespace WhatsTheMusic\Entity;

use Doctrine\Mapping as ORM;

/**
* Quiz Entity
*
* @Entity(repositoryClass="QuizRepository")
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
     * @Column(name="description", type="text")
     * @var $description string
     */
    protected $description;

    /**
     * @Column(name="dificulty", type="string")
     * @var $dificulty string
     */
    protected $dificulty;

    /**
     * @Column(name="maxPoints", type="integer", options={"default" = "0"})
     * @var $maxPoints integer
     */
    protected $maxPoints = 0;

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

    /**
     * Set description
     *
     * @param string $description
     * @return Quiz
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set maxPoints
     *
     * @param integer $maxPoints
     * @return Quiz
     */
    public function setMaxPoints($maxPoints)
    {
        $this->maxPoints = $maxPoints;
    
        return $this;
    }

    /**
     * Get maxPoints
     *
     * @return integer 
     */
    public function getMaxPoints()
    {
        return $this->maxPoints;
    }

    /**
     * Set dificulty
     *
     * @param string $dificulty
     * @return Quiz
     */
    public function setDificulty($dificulty)
    {
        $this->dificulty = $dificulty;
    
        return $this;
    }

    /**
     * Get dificulty
     *
     * @return string 
     */
    public function getDificulty()
    {
        return $this->dificulty;
    }
}