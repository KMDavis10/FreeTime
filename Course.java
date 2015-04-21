// Name: Kyle Davis
// Course: CSC 415
// Semester: Spring 2015
// Instructor: Dr. Pulimood 
// Project name: Free Time Calculator
// Description: An application designed to calculate how much free time a student has 
// Filename: Course.php
// Description: This class is an entity class that stores information about a particular course that a user has
// Last modified on: 4/21/15

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