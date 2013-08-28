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
}