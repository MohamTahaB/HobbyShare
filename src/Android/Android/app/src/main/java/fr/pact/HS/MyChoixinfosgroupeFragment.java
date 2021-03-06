package fr.pact.HS;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

import androidx.fragment.app.Fragment;

import com.google.android.material.floatingactionbutton.FloatingActionButton;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link MyChoixinfosgroupeFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class MyChoixinfosgroupeFragment extends Fragment {

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;
    private Button mGroup1;
    private Button mGroup2;
    private Button mGroup3;
    private FloatingActionButton mEditButton;

    public MyChoixinfosgroupeFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment MyChoixinfosgroupeFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static MyChoixinfosgroupeFragment newInstance(String param1, String param2) {
        MyChoixinfosgroupeFragment fragment = new MyChoixinfosgroupeFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_my_choixinfosgroupe, container, false);


        TextView textview = (TextView) view.findViewById(R.id.textView3);
        textview.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                getActivity().getSupportFragmentManager().beginTransaction().replace(R.id.home, new MyInfosgroupeFragment()).commit();
            }
        });

        return view;
    }









}