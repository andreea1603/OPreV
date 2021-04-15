import java.sql.*;

public class Compulsory {
    public static void main(String[] args) throws SQLException {
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


        String state="INSERT INTO movies values(2, 'valoaer', '2015-12-13', 14, 18)";
        stm.executeUpdate(state);

        System.out.println("Am adaugat");
        String query="SELECT * from movies";
        ResultSet res=stm.executeQuery(query);
        System.out.println(res.getMetaData());
        while (res.next()) {
            int cod=res.getInt("id");
            String nume= res.getString("title");
            System.out.println(nume + cod);
        }
        Dao sts= new Dao();
        sts.findMovie(2, conn);
    }
}

