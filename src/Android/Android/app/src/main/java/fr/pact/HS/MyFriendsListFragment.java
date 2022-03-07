package fr.pact.HS;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;

import com.google.android.material.floatingactionbutton.FloatingActionButton;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link MyFriendsListFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class MyFriendsListFragment extends Fragment {

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    public MyFriendsListFragment() {
        // Required empty public constructor
    }
    private Button mFriend1;
    private Button mFriend2;
    private Button mFriend3;
    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment MyFriendsListFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static MyFriendsListFragment newInstance(String param1, String param2) {
        MyFriendsListFragment fragment = new MyFriendsListFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_my_friends_list, container, false);
        mFriend1 = (Button) view.findViewById(R.id.friend_1);
        mFriend2 = (Button) view.findViewById(R.id.friend_2);
        mFriend3 = (Button) view.findViewById(R.id.friend_3);

        mFriend1.setOnClickListener(new View.OnClickListener(){

        @Override
        public void onClick(View v) {
            FragmentTransaction fragmentTransaction = getChildFragmentManager().beginTransaction();
            fragmentTransaction.replace(R.id.my_friends_list_fragment, new MyFriendProfile());
            fragmentTransaction.addToBackStack(null);
            fragmentTransaction.commit();
        }
    });
        mFriend2.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            FragmentTransaction fragmentTransaction = getChildFragmentManager().beginTransaction();
            fragmentTransaction.replace(R.id.my_friends_list_fragment, new MyFriendProfile());
            fragmentTransaction.addToBackStack(null);
            fragmentTransaction.commit();
        }
    });
        mFriend3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                FragmentTransaction fragmentTransaction = getChildFragmentManager().beginTransaction();
                fragmentTransaction.replace(R.id.my_friends_list_fragment, new MyFriendProfile());
                fragmentTransaction.addToBackStack(null);
                fragmentTransaction.commit();
            }
        });
        return view;
}
}