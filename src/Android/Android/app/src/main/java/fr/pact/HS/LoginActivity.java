package fr.pact.HS;

import androidx.appcompat.app.AppCompatActivity;
import androidx.constraintlayout.motion.widget.MotionScene;

import android.content.Intent;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.lang.String;

public class LoginActivity extends AppCompatActivity {

    private TextView mLoginText;
    private EditText mEmail;
    private EditText mPassword;
    private Button mLoginButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        mLoginText= findViewById(R.id.login_text);
        mEmail = findViewById(R.id.login_editTextTextPersonName);
        mPassword = findViewById(R.id.login_editTextTextPassword);
        mLoginButton = findViewById(R.id.login_button);


    }
    private void CheckLogin (String email, String password){
            Intent researchActivityIntent = new Intent(LoginActivity.this, ResearchActivity.class);
            startActivity(researchActivityIntent);
    }
    public void sendMessage(View view) {
        Intent intent = new Intent(LoginActivity.this, ResearchActivity.class);
        startActivity(intent);

    }

}