<template>
  <div>
    <div class="row">
      <div class="col-sm-6">
        <form @submit.prevent>
          <div class="form-group">
            <label class="control-label">Jam Perawatan / 24 Jam</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.gillies.jperawatan.$error }"
              name="jperawatan"
              v-model="gillies.jperawatan"
              placeholder="Waktu perawatan yang dibutuhkan pasien"
              required
            />
            <div v-if="submitted && $v.gillies.jperawatan.$error" class="invalid-feedback">
              <span
                v-if="!$v.gillies.jperawatan.required"
              >Waktu perawatan yang dibutuhkan pasien harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Sensus harian</label>
            <input
              v-model="gillies.sharian"
              type="number"
              class="form-control sharian"
              :class="{ 'is-invalid': submitted && $v.gillies.sharian.$error }"
              placeholder="BOOR x Jumlah tempat tidur"
            />
            <div v-if="submitted && $v.gillies.sharian.$error" class="invalid-feedback">
              <span v-if="!$v.gillies.sharian.required">BOOR x Jumlah tempat tidur harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah hari libur</label>
            <input
              type="number"
              class="form-control hlibur"
              :class="{ 'is-invalid': submitted && $v.gillies.hlibur.$error }"
              v-model="gillies.hlibur"
              placeholder="Jumlah hari libur"
            />
            <div v-if="submitted && $v.gillies.hlibur.$error" class="invalid-feedback">
              <span v-if="!$v.gillies.hlibur.required">Jumlah hari libur harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah hari kerja setahun, jam kerja perhari = 6 jam</label>
            <input
              type="number"
              class="form-control hkerja"
              :class="{ 'is-invalid': submitted && $v.gillies.hkerja.$error }"
              v-model="gillies.hkerja"
              placeholder="Jumlah hari kerja setahun"
            />
            <div v-if="submitted && $v.gillies.hkerja.$error" class="invalid-feedback">
              <span v-if="!$v.gillies.hkerja.required">Jumlah hari kerja setahun harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jam kerja perhari</label>
            <input
              type="number"
              class="form-control perhari"
              :class="{ 'is-invalid': submitted && $v.gillies.perhari.$error }"
              v-model="gillies.perhari"
              placeholder="Jam kerja perhari"
            />
            <div v-if="submitted && $v.gillies.perhari.$error" class="invalid-feedback">
              <span v-if="!$v.gillies.perhari.required">Jam Kerja perhari harus terisi</span>
            </div>
          </div>
          <button type="button" @click="reLoad" class="btn btn-secondary">Refresh</button>
          <button type="button" @click="onHitung" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-sm-6">
        <div class="mb-5" v-if="hasilnya && submitted">
          <div class="card text-white bg-success text-center">
            <div class="card-header">Hasil perhitungan dengan metode Gillies</div>
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
      gillies: {
        jperawatan: "",
        sharian: "",
        hlibur: "",
        hkerja: "",
        perhari: ""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    gillies: {
      jperawatan: { required },
      sharian: { required },
      hlibur: { required },
      perhari: { required },
      hkerja: { required }
    }
  },
  created() {
    // console.log("OKE")
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }

      const AB365 =
        parseInt(this.gillies.jperawatan) *
        parseInt(this.gillies.sharian) *
        parseInt(this.gillies.perhari)
      const C363JamKerja =
        (parseInt(this.gillies.perhari) - parseInt(this.gillies.hlibur)) *
        parseInt(this.gillies.perhari)
      const hasil = AB365 / C363JamKerja
      this.hasilakhir = hasil.toFixed(2)
      // console.log(hasilakhir)
      this.hasilnya = true
    },
    reLoad() {
      this.gillies = {}
      this.hasilnya = false
    }
  }
}
</script>

<style>
</style>