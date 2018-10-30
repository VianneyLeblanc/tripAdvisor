<?php

namespace App;
class Calendar
{
	private $mouthName =  ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
	private $mounth;
	private $year;
	public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

	function __construct($mounth = null, $year = null)
	{
		if ($year === null) {$year = intval(date('Y'));	} 
		elseif ($year < 1970) {	throw new Exception("L'année ne doit pas être inferieur à 1970");}
		if ($mounth === null) {	$mounth = intval(date('m'));}
		elseif ($mounth < 1 || $mounth > 12) {
			$mounth = $mounth%12;
			$year++;
		}
		$this->mounth = $mounth;
		$this->year = $year;
	}

	public function __toString(){return $this->mouthName[($this->mounth)-1] . ' ' . $this->year;}

	public function getWeeks()
	{
		$start = $this->getFirstDay();
		$end = $this->getFirstDay()->modify('+1 month -1 day');
		$weeks = intval($end->format('W')) - intval($start->format('W'))+1;
		if ($weeks < 0) {
			if ($end->format('m') == 12){$weeks = intval($end->modify('-1 week')->format('W')) - intval($start->format('W'))+2;}
			else{$weeks = intval($end->format('W'));}
		}
		return $weeks;
	}

	public function getFirstDay(){return new \DateTime($this->year."-".$this->mounth."-01");}

	public function onMonth($date){return $this->getFirstDay()->format('Y-m') == $date->format('Y-m');}

	public static function calendrier($nbMois,$id , $arrayDispo = ["ouvert"=>[null], "fermer"=>[null]])
	{
		$calendrier = "";
		for ($n=0; $n <$nbMois ; $n++) { 
			$mounth = new Calendar(intval(date('m'))+$n);
					 $calendrier .="<div id=\"mois_$n\" style=\"\" class=\"calendrier\"><h3>".$mounth."</h3><table><tr>";
			foreach ($mounth->days as $oneDay) {$calendrier .= "<td>".substr($oneDay, 0,2)."</td>";}
			$calendrier .="</tr>";
				 for ($i=0; $i < $mounth->getWeeks(); $i++){
					$calendrier .= "<tr>";
					foreach($mounth->days as $k => $day){
					 $calendrier .= "<td>";
						if ($mounth->getFirstDay()->format('N') == 1){$calculateDay = $mounth->getFirstDay()->modify("+".($k+$i*7)." days");}
						else{$calculateDay = $mounth->getFirstDay()->modify('last monday')->modify("+".($k+$i*7)." days");}
						if(!$mounth->onMonth($calculateDay) || $calculateDay < new \DateTime(intval(date('Y')).'-'.intval(date('m')).'-'.intval(date('d')))){$light = "dark";}
						elseif (in_array($calculateDay->format('Y-m-d'), $arrayDispo["ouvert"]) || $id == 0) {
							$light = 'green';
							$calendrier .= "<a onclick='datePicker(\"".$calculateDay->format('d/m/Y')."\", ".$id.")'>";
						}
						elseif (in_array($calculateDay->format('Y-m-d'), $arrayDispo["fermer"])) {
							$light = 'red';
						}
						else{$light = null;}

						$calendrier .= "<div id=\"".$calculateDay->format('d/m/Y')."\" class=\"$light\">".$calculateDay->format('d')."</div>";
						if ($light=='green') {
							$calendrier .= '</a>';
						}
					$calendrier .="</td>";

					}
				$calendrier .= "</tr>";
				} 
			$calendrier .= "</table></div>";
		}
	return $calendrier;
	}
}
