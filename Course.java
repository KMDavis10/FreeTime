
import java.util.*;

public class Course {
	
	private String courseName;
	private boolean isMajor;
	private int courseLevel;
	private Professor professor;
	private double courseDifficulty = 0;
	
	public Course(String eCourseName, int eCourseLevel, boolean eIsMajor, Professor eProfessor) {
		courseName = eCourseName;
		courseLevel = eCourseLevel;
		isMajor = eIsMajor;
		professor = eProfessor;
	}
	
	public double getCourseDifficulty() {
		courseDifficulty += this.getCourseNameDifficulty();
		courseDifficulty += this.getLevelDifficulty();
		courseDifficulty += professor.getProfDifficulty();
		return courseDifficulty;
	}
	
	private 
	
	
	
	
	
	
	
}