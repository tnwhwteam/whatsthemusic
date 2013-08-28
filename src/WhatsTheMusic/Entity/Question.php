<?php

namespace WhatsTheMusic\Entity;

use Doctrine\Mapping as ORM;

/**
* Question Entity
*
* @Entity
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
	 * @Column(name="correct_answer", type="string")
	 * @var integer $correctAnswer
	 */
	protected $correctAnswer;

	/**
     * @var $answers \Doctrine\Common\Collections\ArrayCollection
     *
     * @ManyToMany(targetEntity="Answer")
     */
	protected $answers;
}