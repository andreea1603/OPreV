import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class Dao {
    public void insertMovie(Connection conn) throws SQLException {
        Statement stm= conn.createStatement();
        String sql;
        sql="INSERT INTO movies values(1, 'titlu', '2015-12-13', 14, 18)";
        stm.executeUpdate(sql);
    }
    public void insertGenres(Connection conn) throws SQLException {
        Statement stm= conn.createStatement();
        String sql;
        sql="INSERT INTO genres values(1, 'pop')";
        stm.executeUpdate(sql);
    }
    public void findMovie(int id, Connection conn) throws SQLException {
        Statement stm= conn.createStatement();
        System.out.println("REZULTATUL CAUTARII ESTE: ");

        String sql="SELECT * FROM movies where id=" + id;
        ResultSet res=stm.executeQuery(sql);
        while (res.next()) {
            int cod=res.getInt("id");
            String nume= res.getString("title");
            System.out.println(nume + cod);
        }
    }
    public void findGenre(int id, Connection conn) throws SQLException {
        Statement stm= conn.createStatement();
        String sql="SELECT * FROM genre where id=" + id;
        ResultSet res=stm.executeQuery(sql);
        System.out.println("REZULTATUL CAUTARII ESTE: ");
        while (res.next()) {
            int cod=res.getInt("id");
            String nume= res.getString("name");
            System.out.println(nume + cod);
        }
    }
}
