package fr.pact.HS;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.io.FileNotFoundException;
import java.io.InputStream;

public class RegisterActivity extends AppCompatActivity {

    private static final int SELECT_PICTURE = 3;
    private TextView mRegisterText;
    private Button mRegisterButton;
    private EditText mBirthDate;
    private EditText mName;
    private EditText mSurname;
    private EditText mPassword;
    private EditText mConfirmPassword;
    private EditText mEmail;
    private ImageView mPhoto;
    private Button mImportButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        mRegisterText= findViewById(R.id.register_text);
        mPhoto= findViewById(R.id.  register_photo);
        mImportButton= findViewById(R.id. register_import_img);
        mSurname = findViewById(R.id.register_editTextTextPersonName);
        mName = findViewById(R.id.register_editTextTextPersonName2);
        mBirthDate = findViewById(R.id.register_editTextDate);
        mEmail= findViewById(R.id.register_editTextTextPersonName3);
        mPassword= findViewById(R.id.register_editTextTextPassword);
        mConfirmPassword= findViewById(R.id.register_editTextTextPassword2);
        mRegisterButton= findViewById(R.id.login_button);

        mRegisterButton.setEnabled(false);

        mConfirmPassword.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {

            }

            @Override
            public void afterTextChanged(Editable s) {
                mRegisterButton.setEnabled(!s.toString().isEmpty());
            }
        });
        mImportButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                imageChooser();
            }

            private void registerForActivityResult(Intent photoPickerIntent, int resultLoadImg) {
            }
        });

        mRegisterButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent researchActivityIntent = new Intent(RegisterActivity.this, ResearchActivity.class);
                startActivity(researchActivityIntent);

            }
        });

    }
    void imageChooser() {

        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);

      startActivityForResult(Intent.createChooser(intent, "Select Picture"), SELECT_PICTURE);
    }


  public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (resultCode == RESULT_OK) {

            // compare the resultCode with the
            // SELECT_PICTURE constant
            if (requestCode == SELECT_PICTURE) {
                // Get the url of the image from data
                Uri selectedImageUri = data.getData();
                if (null != selectedImageUri) {
                    // update the preview image in the layout
                    mPhoto.setImageURI(selectedImageUri);
                    mImportButton.setEnabled(false);
                }
            }
        }
    }
}