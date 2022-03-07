package fr.pact.HS;

import android.os.Bundle;
import android.view.MenuItem;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.TextView;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.navigation.NavigationBarView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;
import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;
import androidx.preference.Preference;
import androidx.preference.PreferenceManager;

import java.util.ArrayList;

import fr.pact.HS.databinding.ActivityResearchBinding;
import fr.pact.HS.ui.home.HomeFragment;

public class ResearchActivity extends AppCompatActivity {


    /* @Override
     protected void onCreate(Bundle savedInstanceState) {
         super.onCreate(savedInstanceState);
         setContentView(R.layout.activity_main);
         mBottomNavigationView = (BottomNavigationView) findViewById(R.id.bottom_navigation);
         mBottomNavigationView.setOnItemSelectedListener(navigationItemSelectedListener);

         loadFragment(new HomeFragment());
     }

     private BottomNavigationView.OnItemSelectedListener navigationItemSelectedListener = new BottomNavigationView.OnItemSelectedListener() {
         @Override
         public boolean onNavigationItemSelected(@NonNull MenuItem item) {

             Fragment fragment;
             switch (item.getItemId()){
                 case R.id.navigation_home:
                     fragment = new HomeFragment();
                     loadFragment(fragment);
                     return true;
                 case R.id.navigation_groupes:
                     fragment = new HomeFragment();
                     loadFragment(fragment);
                     return true;
                 case R.id.navigation_my_profile:
                     fragment = new HomeFragment();
                     loadFragment(fragment);
                     return true;
                 case R.id.navigation_chat:
                     fragment = new HomeFragment();
                     loadFragment(fragment);
                     return true;
             }
             return false;
         };
     };

     private void loadFragment(Fragment fragment){
         FragmentTransaction fragmentTransaction = getSupportFragmentManager().beginTransaction();
         fragmentTransaction.replace(R.id.rootLayout,fragment);
         fragmentTransaction.commit();
     }*/
    private ActivityResearchBinding binding;
    private TextView mName;
    private ImageView mLogo;
    private BottomNavigationView mBottomNavigationView;
    private SearchView mSearchView;
    private ListView mListView;
    private ArrayList<String> list;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //binding = ActivityResearchBinding.inflate(getLayoutInflater());
        setContentView(R.layout.activity_research);
        mName = findViewById(R.id.textView);
        mBottomNavigationView = findViewById(R.id.bottom_navigation);
        mLogo = findViewById(R.id.imageView);
        mBottomNavigationView.setOnItemSelectedListener(navListener);
        mSearchView = (SearchView) findViewById(R.id.home_search_view);
        PreferenceManager.setDefaultValues(this, R.xml.root_preferences,false);
        /*mListView = (ListView) findViewById(R.id.list_view_home);
        list.add("Tous fans de brigde");
        list.add("Le cheval c'est trop génial");
        list.add("Groupe des amateurs de  cuisine");
        list.add("Pokémon,attrapez-les tous");
        list.add("Groupe de lecture");
        list.add("Association des fans de programmation");
        list.add("Amicale des fans de randonnée");
        list.add("Echecs et mat");*/

        //ArrayAdapter adapter = new ArrayAdapter(this, android.R.layout.simple_list_item_1, list);
        // list.setAdapter(adapter);
        getSupportFragmentManager().beginTransaction()
                .replace(R.id.home, new HomeFragment()).commit();
        // Passing each menu ID as a set of Ids because each
        // menu should be considered as top level destinations.
        //AppBarConfiguration appBarConfiguration = new AppBarConfiguration.Builder(
        //    R.id.navigation_home, R.id.navigation_groupes, R.id.navigation_my_profile, R.id.navigation_chat, R.id.navigation_settings)
        //.build();
        // NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment_activity_research);
        //NavigationUI.setupActionBarWithNavController(this, navController, appBarConfiguration);
        //NavigationUI.setupWithNavController(binding.navView, navController);
    }

    private BottomNavigationView.OnItemSelectedListener navListener =
            new BottomNavigationView.OnItemSelectedListener() {

                @Override
                public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                    Fragment selectedFragment = null;
                    switch (item.getItemId()) {
                        case R.id.navigation_home:
                            selectedFragment = new HomeFragment();
                            break;
                        case R.id.navigation_groupes:
                            selectedFragment = new MyGroupListFragment();
                            break;
                        case R.id.navigation_my_profile:
                            selectedFragment = new MyProfileFragment();
                            break;
                        case R.id.navigation_chat:
                            selectedFragment = new ChatFragment();
                            break;
                        case R.id.navigation_settings:
                            selectedFragment = new SettingsFragment();
                            break;
                    }
                    getSupportFragmentManager().beginTransaction().replace(R.id.home, selectedFragment).commit();
                    return true;
                }
            };
}
    /*@Override
    public void onBackPressed() {
        if(getFragmentManager().getBackStackEntryCount() == 0) {
            super.onBackPressed();
        }
        else {
            getFragmentManager().popBackStack();
        }
    }
}
  /*  protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        binding = ActivityResearchBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        mName = findViewById(R.id.research_textView);
        mBottomNavigationView = findViewById(R.id.bottom_navigation);
        mLogo = findViewById(R.id.research_imageView);

    }*/
    /*protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mName = findViewById(R.id.research_textView);
        mBottomNavigationView = findViewById(R.id.bottom_navigation);
        mLogo = findViewById(R.id.research_imageView);

        mBottomNavigationView.setOnItemSelectedListener((NavigationBarView.OnItemSelectedListener) this);
        mBottomNavigationView.setSelectedItemId(R.id.navigation_home);

    }

    /*HomeFragment firstFragment = new HomeFragment();

    public boolean onNavigationItemSelected(@NonNull MenuItem item) {

        switch (item.getItemId()) {
            case R.id.navigation_home:
                getSupportFragmentManager().beginTransaction().replace(R.id.container, firstFragment).commit();
                return true;
        }
        return false;
    }*/
//}
