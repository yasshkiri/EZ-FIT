/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package util;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author MSI
 */
public class MyConnexion {
     private static MyConnexion instance;
    private Connection cnx;
    
    private final String URL = "jdbc:mysql://localhost:3306/project1";
    private final String USER = "root";
    private final String PASSWORD = "";
    
    public MyConnexion() {
        try {
            cnx = DriverManager.getConnection(URL, USER, PASSWORD);
            System.out.println("Connecting !");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    public static MyConnexion getInstance() {
        if(instance == null)
            instance = new MyConnexion();
        return instance;
    }

    public Connection getCnx() {
        return cnx;
    }
   
}
