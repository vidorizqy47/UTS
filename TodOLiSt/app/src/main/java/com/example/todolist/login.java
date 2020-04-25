package com.example.todolist;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import androidx.appcompat.app.AppCompatActivity;

public class login extends AppCompatActivity implements View.OnClickListener {
    public static final String USER_NAME="User_Name";
    private static final String LOGIN_URL="https://vrteknikinformatika.000webhostapp.com/web_service/login.php";

    private EditText editTextUserName;
    private EditText editTextPassword;
    private Button buttonLogin, register;

    @Override
    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

    }
}
