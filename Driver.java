
import java.io.*;
import java.util.*;
public class Driver {
	
	public static void main (String[] args) throws IOException {
		
		ReadFile file = new ReadFile();
		file.readData();
		Professor professor = file.getProfessor("Christina Lee");
		System.out.println(professor);
		
	}
	
}