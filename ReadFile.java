

import java.io.*;
import java.util.*;

public class ReadFile {
	
	private Professor professors[] = new Professor[100];
	private Scanner scan;
	private int count = 0;
	
	public void readData () throws IOException {
		scan = new Scanner (new File("professors.txt"));
		while (scan.hasNext()) {
			String line = scan.nextLine();
			Scanner lineScan = new Scanner(line);
			while(lineScan.hasNext()) {
				String x1 = lineScan.next();
				System.out.println(x1);
				String x2 = lineScan.next();
				System.out.println(x2);
				double x3 = lineScan.nextDouble();
				System.out.println(x3);
				double x4 = lineScan.nextDouble();
				System.out.println(x4);
				double x5 = lineScan.nextDouble();
				professors[count] = new Professor(x1 + " " + x2, x3, x4, x5);
				count++;
			}
		}
	}
	
	public Professor getProfessor(String name) {
		for (int i = 0; i < count; i++) {
			if (professors[i].getName().equals(name)){
				return professors[i];
			}
		}
		return null;
	}
	
}