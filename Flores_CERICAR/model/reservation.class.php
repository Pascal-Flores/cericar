<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="jabaianb.reservation")
 */
class reservation{

	/** @Id 
     * @Column(type="integer")
	 * @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="integer") */ 
	public $voyage;
		
	/** @Column(type="integer") */ 
	public $voyageur;
    
}

?>
