package test.switchingscreenstest;

import android.app.ListActivity;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;

public class HomeListView extends ListActivity {

    @Override

    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        String[] pages = getResources().getStringArray(R.array.pages_array);
        setListAdapter(new ArrayAdapter<>(this, R.layout.list_item, pages));

        ListView lv = getListView();
        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                Intent myIntent = null;

                if(((TextView) view).getText().equals("Page 1")){
                    myIntent = new Intent(view.getContext(), Page1.class);
                }

                if(((TextView) view).getText().equals("Page 2")){
                    myIntent = new Intent(view.getContext(), Page2.class);
                }

                if(((TextView) view).getText().equals("Page 3")){
                    myIntent = new Intent(view.getContext(), Page3.class);
                }

                //if(((TextView) view).getText().equals("Switch to button mode")){
                //myIntent = new Intent(view.getContext(), ButtonPage.class);
                //}

                startActivity(myIntent);

            }
        });
    }
}
