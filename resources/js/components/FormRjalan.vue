<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="mb-5" v-if="hasilnya && submitted">
          <div class="card text-white bg-success text-center">
            <div class="card-header">Hasil perhitungan dengan metode DEPKES - Rawat Jalan</div>
            <div class="card-body text-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-users"
              >
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
              </svg>
              <p class="card-text">Jumlah Tenaga yang dibutuhkan =</p>
              <div style="display:inline-block ">
                <h2>{{hasilakhir}}</h2>Tenaga Perawat
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <form @submit.prevent>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label">Rata-rata pasien / hari</label>
            <input
              type="number"
              name="rapas"
              v-model="rjalan.rapas"
              class="form-control rapas"
              :class="{ 'is-invalid': submitted && $v.rjalan.rapas.$error }"
              placeholder="Rata rata pasien perhari"
            />
            <div v-if="submitted && $v.rjalan.rapas.$error" class="invalid-feedback">
              <span v-if="!$v.rjalan.rapas.required">Rata rata pasien perhari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Rata-rata jam perawatan / hari</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.rjalan.rajam.$error }"
              name="rajam"
              v-model="rjalan.rajam"
              placeholder="Rata-rata jam perawatan / hari"
            />
            <div v-if="submitted && $v.rjalan.rajam.$error" class="invalid-feedback">
              <span v-if="!$v.rjalan.rajam.required">Rata-rata jam perawatan / hari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jam kerja efektif</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.rjalan.jke.$error }"
              name="jke"
              v-model="rjalan.jke"
              placeholder="Jam kerja efektif"
            />
            <div v-if="submitted && $v.rjalan.jke.$error" class="invalid-feedback">
              <span v-if="!$v.rjalan.jke.required">Jam kerja efektif harus terisi</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label">60</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.rjalan.enampuluh.$error }"
              name="enampuluh"
              v-model="rjalan.enampuluh"
              placeholder="60"
            />
            <div v-if="submitted && $v.rjalan.enampuluh.$error" class="invalid-feedback">
              <span v-if="!$v.rjalan.enampuluh.required">60 harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Faktor Koreksi (15%)</label>
            <div class="row">
              <div class="col-sm-10">
                <input
                  type="number"
                  class="form-control"
                  :class="{ 'is-invalid': submitted && $v.rjalan.fakor.$error }"
                  name="fakor"
                  v-model="rjalan.fakor"
                  placeholder="Faktor Koreksi"
                />
              </div>
              <span class="col-sm-2 pb-1"><h3>%</h3></span>
            </div>

            <div v-if="submitted && $v.rjalan.fakor.$error" class="invalid-feedback">
              <span v-if="!$v.rjalan.fakor.required">Faktor Koreksi harus terisi</span>
            </div>
          </div>
          <button type="button" @click="reLoad" class="btn btn-secondary">Refresh</button>
          <button type="button" @click="onHitung" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators"
export default {
  data() {
    return {
      rjalan: {
        rapas: "",
        rajam: "",
        jke: "",
        enampuluh: "",
        fakor: ""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    rjalan: {
      rapas: { required },
      rajam: { required },
      jke: { required },
      enampuluh: { required },
      fakor: { required }
    }
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }

      const atas = parseInt(this.rjalan.rapas) * parseInt(this.rjalan.rajam)
      // console.log(this.rjalan.rapas);
      // console.log(this.rjalan.rajam);
      
      
      // console.log(atas);
      
      const bawah = parseInt(this.rjalan.jke) * parseInt(this.rjalan.enampuluh)
      // console.log(bawah);
      
      const subhasil = atas / bawah
      const fakor = parseInt(this.rjalan.fakor) / 100
      // console.log(fakor);
      
      const hasil = subhasil + fakor
      this.hasilakhir = hasil.toFixed(2)
      //   console.log(hasilakhir)
      this.hasilnya = true
    },
    reLoad() {
      this.rjalan = {}
      this.hasilnya = false
    }
  }
}
</script>

<style>
</style>