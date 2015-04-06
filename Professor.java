
import java.util.*;

public class Professor {
	
	private String profName;
	private double profEasy;
	private double profClarity;
	private double profHelpful;
	
	public Professor(String eProfName, double eProfEasy, double eProfClarity, double eProfHelpful){
	
		profName = eProfName;
		profEasy = eProfEasy;
		profClarity = eProfClarity;
		profHelpful = eProfHelpful;
		
	}
	
	public String getName () {
		return profName;
	}
	
	public double getProfEasy() {
		return profEasy;
	}
	
	public double getProfClarity() {
		return profClarity;
	}
	
	public double getProfHelpful() {
		return profHelpful;
	}
	
	public double getProfDifficulty() {
		double x1 = 5-profEasy;
		double x2 = 5-profClarity;
		double x3 = 5-profHelpful;
		double professorDifficulty = x1+x2+x3;
		return professorDifficulty;
	}
	
	public String toString() {
		String message = profName + " " + Double.toString(this.profDifficulty());
		return message;
	}
	
	
}