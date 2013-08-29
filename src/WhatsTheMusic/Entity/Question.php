<?php

namespace WhatsTheMusic\Entity;

use Doctrine\Mapping as ORM;

/**
* Question Entity
*
* @Entity(repositoryClass="QuestionRepository")
* @Table("question")
*/
class Question
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
	 * @var integer $correctAnswer
     *
     * @OneToOne(targetEntity="Answer")
	 */
	protected $correctAnswer;

	/**
     * @var $answers \Doctrine\Common\Collections\ArrayCollection
     *
     * @ManyToMany(targetEntity="Answer")
     */
	protected $answers;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set text
     *
     * @param string $text
     * @return Question
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
     * Set correctAnswer
     *
     * @param string $correctAnswer
     * @return Question
     */
    public function setCorrectAnswer($correctAnswer)
    {
        $this->correctAnswer = $correctAnswer;
    
        return $this;
    }

    /**
     * Get correctAnswer
     *
     * @return string 
     */
    public function getCorrectAnswer()
    {
        return $this->correctAnswer;
    }

    /**
     * Add answers
     *
     * @param \WhatsTheMusic\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\WhatsTheMusic\Entity\Answer $answers)
    {
        $this->answers[] = $answers;
    
        return $this;
    }

    /**
     * Remove answers
     *
     * @param \WhatsTheMusic\Entity\Answer $answers
     */
    public function removeAnswer(\WhatsTheMusic\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}