package com.example.uts.todolistapps;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class UpdateDataDiri extends AppCompatActivity {

    private EditText editTextId, editTextNama, editTextTanggal, editTextWaktu, editTextKeterangan;
    private Button update, hapus;
    private String id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_update_data_diri);

        Intent intent = getIntent();
        id = intent.getStringExtra("user_id");

        editTextId = (EditText) findViewById(R.id.etIdP);
        editTextNama = (EditText) findViewById(R.id.etNama);
        editTextTanggal = (EditText) findViewById(R.id.etTanggal);
        editTextWaktu = (EditText) findViewById(R.id.etWaktu);
        editTextKeterangan = (EditText) findViewById(R.id.etDes);
        update = (Button) findViewById(R.id.btnUpdate);
        hapus = (Button) findViewById(R.id.btnHapus);

        update.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (editTextNama.getText().toString().trim().length() == 0
                        || editTextTanggal.getText().toString().trim().length() == 0
                        || editTextWaktu.getText().toString().trim().length() == 0
                        || editTextKeterangan.getText().toString().trim().length() == 0) {
                    Toast.makeText(UpdateDataDiri.this, "Data tidak boleh kosong !", Toast.LENGTH_LONG).show();
                } else {
                    updatePesanan();
                    startActivity(new Intent(UpdateDataDiri.this, DataDiri.class));
                    finish();
                }
            }
        });

        hapus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                confirmDeletePesanan();
            }
        });

        editTextId.setText(id);
        getPesanan();
    }

    private void getPesanan(){
        class GetPesanan extends AsyncTask<Void,Void,String> {
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(UpdateDataDiri.this,"Fetching...","Wait...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                showPesanan(s);
            }

            @Override
            protected String doInBackground(Void... params) {
                RequestHandler rh = new RequestHandler();
                String s = rh.sendGetRequestParam("https://vrteknikinformatika.000webhostapp.com/todolist/Jadwal/get_jawal.php?id=",id);
                return s;
            }
        }
        GetPesanan gp = new GetPesanan();
        gp.execute();
    }

    private void showPesanan(String json){
        try {
            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray("result");
            JSONObject c = result.getJSONObject(0);
            String fullname = c.getString("fullname");
            String tanggal = c.getString("tanggal");
            String waktu = c.getString("waktu");
            String keterangan = c.getString("keterangan");

            editTextNama.setText(fullname);
            editTextTanggal.setText(tanggal);
            editTextWaktu.setText(waktu);
            editTextKeterangan.setText(keterangan);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    private void updatePesanan(){

        final String fullname = editTextNama.getText().toString();
        final String tanggal = editTextTanggal.getText().toString();
        final String waktu = editTextWaktu.getText().toString();
        final String keterangan = editTextKeterangan.getText().toString();

        class UpdatePesanan extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(UpdateDataDiri.this,"Updating...","Wait...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(UpdateDataDiri.this, s, Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... params) {
                HashMap<String,String> hashMap = new HashMap();
                hashMap.put("id",id);
                hashMap.put("fullname",fullname);
                hashMap.put("tanggal",tanggal);
                hashMap.put("waktu",waktu);
                hashMap.put("keterangan",keterangan);


                RequestHandler rh = new RequestHandler();

                String s = rh.sendPostRequest("https://vrteknikinformatika.000webhostapp.com/todolist/Jadwal/update_jadwal.php", hashMap);

                return s;
            }
        }

        UpdatePesanan up = new UpdatePesanan();
        up.execute();
    }

    private void deletePesanan(){
        class DeletePesanan extends AsyncTask<Void,Void,String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(UpdateDataDiri.this, "Deleting...", "Wait...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(UpdateDataDiri.this, s, Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... params) {
                RequestHandler rh = new RequestHandler();
                String s = rh.sendGetRequestParam("https://vrteknikinformatika.000webhostapp.com/todolist/Jadwal/delete_jadwal.php?id=", id);
                return s;
            }
        }

        DeletePesanan dp = new DeletePesanan();
        dp.execute();
    }

    private void confirmDeletePesanan(){
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(this);
        alertDialogBuilder.setMessage("Apakah anda ingin mengapus data ini?");

        alertDialogBuilder.setPositiveButton("Ya",
                new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface arg0, int arg1) {
                        deletePesanan();
                        startActivity(new Intent(UpdateDataDiri.this, DataDiri.class));
                        finish();
                    }
                });

        alertDialogBuilder.setNegativeButton("Tidak",
                new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface arg0, int arg1) {

                    }
                });

        AlertDialog alertDialog = alertDialogBuilder.create();
        alertDialog.show();
    }
}