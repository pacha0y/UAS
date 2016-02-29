import java.util.PriorityQueue;
import java.util.HashSet;
import java.util.Set;
import java.util.List;
import java.util.Comparator;
import java.util.ArrayList;

import java.util.Collections;
import java.util.Stack;
 
public class AstarSearchAlgo{
	//h scores is the stright-line distance from the current city to Bucharest
    public static void main(String[] args){
    	//initialize the graph base.
        Node n1 = new Node("A",366);
        Node n2 = new Node("B",374);
        Node n3 = new Node("C",380);
        Node n4 = new Node("D",253);
        Node n5 = new Node("E",178);
        Node n6 = new Node("F",193);
        Node n7 = new Node("G",98);
       
                //initialize the edges connecting each node
 
                //Adjacent nodes for node A i.e B,D and H
                n1.adjacencies = new Edge[]{
                        new Edge(n2,75),
                        new Edge(n4,140),
                        //new Edge(n8,118)
                };
                 
                 //Adjacent nodes for node B i.e A,C
                n2.adjacencies = new Edge[]{
                        new Edge(n1,75),
                        new Edge(n3,71)
                };
                 
 
                 //Adjacent nodes for node C i.e B,D
                n3.adjacencies = new Edge[]{
                        new Edge(n2,71),
                        new Edge(n4,151),
                        new Edge(n6,20)
                        
                };
                 
                 //Adjacent nodes for node D i.e A,C,E, F
                n4.adjacencies = new Edge[]{
                        new Edge(n1,140),
                        new Edge(n5,99),
                        new Edge(n3,151),
                        new Edge(n6,80),
                };
                 
 
                 //Adjacent nodes for node E i.e D,M
                n5.adjacencies = new Edge[]{
                        new Edge(n4,99),
                        new Edge(n7,40)
                };
                 
                 //Adjacent nodes for F i.e D, G, L
                n6.adjacencies = new Edge[]{
                        new Edge(n4,80),
                        new Edge(n7,97),
                        new Edge(n6,20)
                };
                 
                 //Adjacent nodes for node G i.e F, M, L
                n7.adjacencies = new Edge[]{
                        new Edge(n6,97),
                        new Edge(n5,40),
                        //new Edge(n12,138)
                };
        

                 //Adjacent nodes for node L i.e K, F, G
            
                //AstarSearch(n1,n7);
                dfsSearch(n1,n3);
 
                //List<Node> path = printPath(n7);
                List<Node> path1 =printPath1(n3);
 
                  //      System.out.println( path);
                        System.out.println( path1);
 
 
        }
 
     
		
	

	public static List<Node> printPath1(Node target) {
    	   List<Node> path1 = new ArrayList<Node>();
       	
       	for(Node node = target; node!=null; node = node.parent){
       		path1.add(node);
       	}

       	Collections.reverse(path1);

       	return path1;
	}

       
       
		public static List<Node> printPath(Node target){
        	List<Node> path = new ArrayList<Node>();
        	
        	for(Node node = target; node!=null; node = node.parent){
        		path.add(node);
        	}
 
        	Collections.reverse(path);
 
        	return path;
        }
		
		public static void dfsSearch(Node source,Node goal) {	
			Set<Node> explored = new HashSet<Node>();
	    	Stack<Node> s=new Stack<Node>();
	 		//s.push(source);
	 		s.add(source);
	 		boolean found = false;
	 		//source.visited=true;
	 		
            while((!s.isEmpty())&&(!found)){
            	 
                //the node in having the lowest f_score value
                Node current =(Node) s.pop();

                explored.add(current);

                //goal found
                if(current.value.equals(goal.value)){
                        found = true;
                }

                //check every child of current node
                for(Edge e : current.adjacencies){
                        Node child = e.target;
                        
                        /*if child node has been evaluated and 
                        the newer f_score is higher, skip*/
                        
                        if(explored.contains(child)){
                                continue;
                        }

                        /*else if child node is not in queue or 
                        newer f_score is lower*/
                        
                        else if(!s.contains(child)){

                                child.parent = current;
                                
                                if(s.contains(child)){
                                        s.remove(child);
                                }

                                s.add(child);

                        }

                }

        }
	 		
	 		
	      
  /*    public static void AstarSearch(Node source, Node goal){
        	
        	Set<Node> explored = new HashSet<Node>();
 
        	PriorityQueue<Node> queue = new PriorityQueue<Node>(20, 
        			new Comparator<Node>(){
                 //override compare method
                 public int compare(Node i, Node j){
                    if(i.f_scores > j.f_scores){
                        return 1;
                    }
 
                    else if (i.f_scores < j.f_scores){
                        return -1;
                    }
 
                    else{
                        return 0;
                    }
                 }
 
                        }
                        );
 
                //cost from start
                source.g_scores = 0;
 
                queue.add(source);
 
                boolean found = false;
 
                while((!queue.isEmpty())&&(!found)){
 
                        //the node in having the lowest f_score value
                        Node current = queue.poll();
 
                        explored.add(current);
 
                        //goal found
                        if(current.value.equals(goal.value)){
                                found = true;
                        }
 
                        //check every child of current node
                        for(Edge e : current.adjacencies){
                                Node child = e.target;
                                double cost = e.cost;
                                double temp_g_scores = current.g_scores + cost;
                                double temp_f_scores = temp_g_scores + child.h_scores;
 
 
                                /*if child node has been evaluated and 
                                the newer f_score is higher, skip*/
                            /*    
                                if((explored.contains(child)) && 
                                        (temp_f_scores >= child.f_scores)){
                                        continue;
                                }
 
                                /*else if child node is not in queue or 
                                newer f_score is lower*/
                            /*    
                                else if((!queue.contains(child)) || 
                                        (temp_f_scores < child.f_scores)){
 
                                        child.parent = current;
                                        child.g_scores = temp_g_scores;
                                        child.f_scores = temp_f_scores;
 
                                        if(queue.contains(child)){
                                                queue.remove(child);
                                        }
 
                                        queue.add(child);
 
                                }
 
                        }
 
                }
 
        }
 */      
}
}
 
class Node{
	public final String value;
    public double g_scores;
    public final double h_scores;
    public double f_scores = 0;
    public Edge[] adjacencies;
    public Node parent;
    public char label;
	public boolean visited=false;
 
    public Node(String val, double hVal){
    	value = val;
        h_scores = hVal;
    }
 
    public String toString(){
    	return value;
    }
}
 
class Edge{
	public final double cost;
    public final Node target;
 
    public Edge(Node targetNode, double costVal){
    	target = targetNode;
        cost = costVal;
     }
}

