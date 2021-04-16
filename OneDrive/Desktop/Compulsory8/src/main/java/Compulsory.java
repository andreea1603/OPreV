import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.sql.*;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;


public class Compulsory {
    public static void main(String[] args) throws SQLException, FileNotFoundException {
        String diver="com.sql.jdbc.Driver";
        Singleton s= Singleton.getInstance();
        Connection conn= s.conn;

        Statement stm= conn.createStatement();

        String sql="CREATE TABLE IF NOT EXISTS movies (id INTEGER, title VARCHAR(200), release_date DATE, duration INTEGER, score INTEGER)";

        stm.executeUpdate(sql);
        sql="CREATE TABLE IF NOT EXISTS genres (id INTEGER, name VARCHAR(200))";
        stm.executeUpdate(sql);
        sql="CREATE TABLE IF NOT EXISTS assoc (id_movie INTEGER, id_gen INTEGER)";
        stm.executeUpdate(sql);

       // String state="INSERT INTO movies values(2, 'valoaer', '2015-12-13', 14, 18)";
       // stm.executeUpdate(state);

        String query="SELECT * from genres";
        ResultSet res=stm.executeQuery(query);
        System.out.println(res.getMetaData());
        System.out.println("Afisez rezultatul genurilor:");

        while (res.next()) {
            int cod=res.getInt("id");
            String nume= res.getString("name");
            System.out.println(nume + cod);
        }
        Dao sts= new Dao();
        //CREARE DE TABELE
       sql="CREATE TABLE IF NOT EXISTS actors (name VARCHAR(200), release_date DATE, duration INTEGER, score INTEGER)";
        stm.executeUpdate(sql);

        /// IMPORT DATA

        Tool t=new Tool();
        List<List<String>> results=new ArrayList<>();
        results=t.tool();
        System.out.println("am scos genul");
        t.add();
        System.out.println("am iesit");
        int ok=0, m=0;
        while(ok==0){
            System.out.println("Alege optiunea potrivita: \n\t 1) Adauga un film \n\t 2)Adauga un gen");
            System.out.println("\t3)Cauta un film \n\t4)Cauta un gen\n\t5)Iesire");

            m=5;
            if(m==5)
                ok=1;
        }


    }
}

