<?php
class Professor
{
	private $profName;
	private $profHelp = 0;
	private $profClarity = 0;
	private $profEasy = 0;
	public function Professor() {
		//echo $profHelp . $profClarity . $profEasy;
	}
	
	public function setProfName($eProfName) {
		$this->profName = $eProfName;
	}
	
	public function setProfClarity($eProfClarity) {
		$this->profClarity = $eProfClarity;
	}
	
	public function setProfHelp($eProfHelp) {
		$this->profHelp = $eProfHelp; 
	}
	
	public function setProfEasy($eProfEasy) {
		$this->profEasy = $eProfEasy;
	}
	
    public function difficulty_Prof()
    {

        return 5-$this->profHelp + 5-$this->profClarity + 5-$this->profEasy;
    }
	 public function getProfName()
    {
		$returnProf = $this->profName;
		return $returnProf;	
	}
	public function __toString ()
	{
		$returnProf = $this->profName;
		return $returnProf;	
	}
}
?>