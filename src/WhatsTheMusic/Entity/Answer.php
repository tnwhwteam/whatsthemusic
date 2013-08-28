<?php

namespace WhatsTheMusic\Entity;

use Doctrine\Mapping as ORM;

/**
* Answer Entity
*
* @Entity
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


}