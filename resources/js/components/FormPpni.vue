<template>
  <div>
    <div class="row">
      <div class="col-sm-6">
        <form @submit.prevent>
          <div class="form-group">
            <label class="control-label">Jam Perawatan / 24 Jam</label>
            <input
              type="number"
              name="jperawatan"
              v-model="ppni.jperawatan"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ppni.jperawatan.$error }"
              placeholder="Waktu perawatan yang dibutuhkan pasien"
            />
            <div v-if="submitted && $v.ppni.jperawatan.$error" class="invalid-feedback">
              <span
                v-if="!$v.ppni.jperawatan.required"
              >Waktu perawatan yang dibutuhkan pasien harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah tempat tidur</label>
            <input
              type="number"
              name="jttidur"
              v-model="ppni.jttidur"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ppni.jttidur.$error }"
              placeholder="jumlah tempat tidur"
            />
            <div v-if="submitted && $v.ppni.jttidur.$error" class="invalid-feedback">
              <span v-if="!$v.ppni.jttidur.required">jumlah tempat tidur harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Bed Occupation Rate (BOR)</label>
            <input
              type="number"
              name="bor"
              v-model="ppni.bor"
              class="form-control"
              lang="nb"
              :class="{ 'is-invalid': submitted && $v.ppni.bor.$error }"
              placeholder="Jumlah hari kerja setahun"
            />
            <div v-if="submitted && $v.ppni.bor.$error" class="invalid-feedback">
              <span v-if="!$v.ppni.bor.required">Bed Occupation Rate (BOR) harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Hari kerja efektif (HKE)</label>
            <input
              type="number"
              name="hke"
              v-model="ppni.hke"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ppni.hke.$error }"
              placeholder="Hari kerja efektif"
            />
            <div v-if="submitted && $v.ppni.hke.$error" class="invalid-feedback">
              <span v-if="!$v.ppni.hke.required">Hari kerja efektif harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jam kerja perhari</label>
            <input
              type="number"
              name="jkp"
              v-model="ppni.jkp"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ppni.jkp.$error }"
              placeholder="jam kerja perhari"
            />
            <div v-if="submitted && $v.ppni.jkp.$error" class="invalid-feedback">
              <span v-if="!$v.ppni.jkp.required">jam kerja perhari harus terisi</span>
            </div>
          </div>
          <button type="button" @click="reLoad" class="btn btn-secondary">Refresh</button>
          <button type="button" @click="onHitung" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-sm-6">
        <div class="mb-5" v-if="hasilnya && submitted">
          <div class="card text-white bg-success text-center">
            <div class="card-header">Hasil perhitungan dengan metode PPNI</div>
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
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators"
export default {
  data() {
    return {
      minggudlmsetahun : 52,
      ppni: {
        jperawatan: "",
        jttidur: "",
        bor: "",
        hke: "",
        jkp: ""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    ppni: {
      jperawatan: { required },
      jttidur: { required },
      bor: { required },
      hke: { required },
      jkp: { required }
    }
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }
      
      const atassatu =
        parseInt(this.ppni.jperawatan) * this.minggudlmsetahun

      // console.log(atassatu);
      
      const atasdua = 7 * (parseInt(this.ppni.jttidur) * parseFloat(this.ppni.bor))
      // console.log(atasdua);
      
      const atastiga = atassatu * atasdua * 125 / 100
      // console.log(atastiga);
      
      const atas = atastiga + 25 / 100

      const bawah = parseInt(this.ppni.hke) * parseInt(this.ppni.jkp)
      const hasil = atas / bawah
      this.hasilakhir = hasil.toFixed(2)
      this.hasilnya = true
    },
    reLoad() {
      this.ppni = {}
      this.hasilnya = false
    }
  }
}
</script>

<style>
</style>