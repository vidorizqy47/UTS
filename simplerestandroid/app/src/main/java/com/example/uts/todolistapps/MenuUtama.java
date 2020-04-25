package com.example.uts.todolistapps;

import android.content.Intent;
import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MenuUtama extends AppCompatActivity {
    Button button1,button4,Logout;
    TextView tvTampil;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_utama);

        Intent intent = getIntent();



        button1=(Button)findViewById(R.id.bt1);
        button1.setOnClickListener(new View.OnClickListener() {
            public void onClick(View arg0) {
                // TODO Auto-generated method stub
                Intent i =new Intent(getApplicationContext(),DataDiri.class);
                startActivity(i);
            }
        });

        button4=(Button)findViewById(R.id.bt4);
        button4.setOnClickListener(new View.OnClickListener() {
            public void onClick(View arg0) {
                // TODO Auto-generated method stub
                Intent i =new Intent(getApplicationContext(),DataUser.class);
                startActivity(i);
            }
        });

        Logout = (Button) findViewById(R.id.btnLg);
        Logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                Intent i =new Intent(getApplicationContext(),Login.class);
                startActivity(i);
            }
        });

    }
}