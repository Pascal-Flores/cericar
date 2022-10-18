<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="jabaianb.voyage")
 */
class voyage{

	/** @Id 
     * @Column(type="integer")
	 * @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="integer") */ 
	public $conducteur;
		
	/** @Column(type="integer") */ 
	public $trajet;

	/** @Column(type="integer") */ 
	public $tarif;

    /** @Column(type="integer") */ 
	public $nbplace;

	/** @Column(type="integer") */ 
	public $heuredepart;

	/** @Column(type="string", length="500") */ 
	public $contraintes;

}

?>
