import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Tool {


    List<List<String>> tool(){
        List<List<String >> rec= new ArrayList<>();
        int k=0;
        try(BufferedReader br= new BufferedReader(new FileReader("C:\\Users\\andre\\OneDrive\\Desktop\\Compulsory8\\src\\main\\java\\IMDbMovies.csv"))){
            String line;
            while((line=br.readLine())!=null){
                k++;
                String values[]= line.split(",");
                rec.add(Arrays.asList(values));

                String[] val= Arrays.toString(values).split(",");
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
        return rec;
    }
    void add(){
        String gen;
        List<List<String>> genre=this.tool();
        List<String> genurile=new ArrayList<>();
        for(int i=0; i<genre.size(); i++){
            int col=5;
            if(distinct(genurile, genre.get(i).get(col))==1)
            {
                System.out.println(genre.get(i).get(col));
                genurile.add(genre.get(i).get(col));
            }
        }
    }
    int distinct(List<String> lista, String find){

        for(int i=0; i< lista.size(); i++)
            if(lista.get(i).compareTo(find)==0){
                return 0;
            }
        return 1;
    }
}
