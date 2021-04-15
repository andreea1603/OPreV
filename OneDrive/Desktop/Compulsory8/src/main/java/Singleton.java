import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

public class Singleton {
    public static Singleton s1= null;
    public Connection conn=null;

    private Singleton(){
        String url="jdbc:mysql://localhost/REGISTRATION";
        String user="root";
        String pass="";
        Statement st = null;
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn= DriverManager.getConnection(url, user, pass);
        } catch (SQLException | ClassNotFoundException throwables) {
            throwables.printStackTrace();
        }
        System.out.println("Conexiune realizata");
    }
    public static Singleton getInstance()
    {
        if(s1==null)
            s1=new Singleton();
        return s1;
    }
}