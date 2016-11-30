package com.demo.servlet;

import java.io.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.*;
import java.sql.*;
/**
 * Servlet implementation class AddPlayerServlet
 */
@WebServlet("/addplayer")
@MultipartConfig
public class AddPlayerServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public AddPlayerServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
        try {
           
            String p =  request.getParameter("playername");

            Part photo =  request.getPart("playerphoto");
                        
           
            // Connect to Oracle
            Class.forName("oracle.jdbc.driver.OracleDriver");
            Connection con = DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521:xe", "system", "tiger");

            PreparedStatement ps = con.prepareStatement("insert into players values(?,?)");
            ps.setString(1, p);
            // size must be converted to int otherwise it results in error
            ps.setBinaryStream(2, photo.getInputStream(), (int)  photo.getSize());
            ps.executeUpdate();
            con.commit();
            con.close();
            out.println("Added Player Successfully.");
        } 
        catch(Exception ex) {
            System.out.println(ex.getMessage());
        }
        finally {            
            out.close();
        }
	
	
	}

}
