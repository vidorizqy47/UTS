package com.example.uts.todolistapps;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import java.util.HashMap;

public class MainActivity extends AppCompatActivity {

    private EditText editTextNama, editTextTanggal, editTextWaktu, editTextKeterangan;
    private Button simpan, lihat;
    private static final String REGISTER_URL = "https://vrteknikinformatika.000webhostapp.com/todolist/Jadwal/jadwal.php";
    String fullname, tanggal, waktu, keterangan;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        editTextNama = (EditText) findViewById(R.id.etNama);
        editTextTanggal = (EditText) findViewById(R.id.etTanggal);
        editTextWaktu = (EditText) findViewById(R.id.etWaktu);
        editTextKeterangan = (EditText) findViewById(R.id.etDes);
        simpan = (Button) findViewById(R.id.btnSimpan);
        lihat= (Button) findViewById(R.id.btnlihat);

        simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                fullname = editTextNama.getText().toString();
                tanggal = editTextTanggal.getText().toString();
                waktu = editTextWaktu.getText().toString();
                keterangan = editTextKeterangan.getText().toString();

                pesan(fullname, tanggal, waktu, keterangan);
            }
        });

        lihat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MainActivity.this, DataDiri.class));
            }
        });



    }

    private void pesan(String fullname, String tanggal, String waktu, String keterangan) {
        class tambahJadwal extends AsyncTask<String, Void, String> {
            ProgressDialog loading;
            RequestHandler requestHandler = new RequestHandler();

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(MainActivity.this, "Please Wait", "Loading...");
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                if (editTextNama.getText().toString().trim().length() == 0
                        || editTextTanggal.getText().toString().trim().length() == 0
                        || editTextWaktu.getText().toString().trim().length() == 0
                        || editTextKeterangan.getText().toString().trim().length() == 0) {
                    Toast.makeText(getApplicationContext(), s, Toast.LENGTH_LONG).show();
                } else {
                    Intent i = new Intent(MainActivity.this, DataDiri.class);
                    finish();
                    startActivity(i);
                    Toast.makeText(getApplicationContext(), s, Toast.LENGTH_LONG).show();
                }
            }

            @Override
            protected String doInBackground(String... params) {

                HashMap<String, String> data = new HashMap<String,String>();
                data.put("fullname",params[0]);
                data.put("tanggal",params[1]);
                data.put("waktu",params[2]);
                data.put("keterangan",params[3]);

                String result = requestHandler.sendPostRequest(REGISTER_URL,data);

                return  result;
            }
        }

        tambahJadwal ru = new tambahJadwal();
        ru.execute(fullname, tanggal, waktu, keterangan);
    }
}