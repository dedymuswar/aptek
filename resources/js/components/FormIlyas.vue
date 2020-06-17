<template>
  <div>
    <form @submit.prevent>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label">Jam Perawatan / 24 Jam</label>
            <input
              type="number"
              name="jperawatan"
              v-model="ilyas.jperawatan"
              class="form-control jperawatan"
              :class="{ 'is-invalid': submitted && $v.ilyas.jperawatan.$error }"
              placeholder="Waktu perawatan yang dibutuhkan pasien"
            />
            <div v-if="submitted && $v.ilyas.jperawatan.$error" class="invalid-feedback">
              <span
                v-if="!$v.ilyas.jperawatan.required"
              >Waktu perawatan yang dibutuhkan pasien harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Sensus harian</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ilyas.sharian.$error }"
              name="sharian"
              v-model="ilyas.sharian"
              placeholder="BOOR x Jumlah tempat tidur"
            />
            <div v-if="submitted && $v.ilyas.sharian.$error" class="invalid-feedback">
              <span v-if="!$v.ilyas.sharian.required">BOOR x Jumlah tempat tidur harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah hari kerja setahun, jam kerja perhari = 6 jam</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ilyas.hkerja.$error }"
              name="hkerja"
              v-model="ilyas.hkerja"
              placeholder="Jumlah hari kerja setahun"
            />
            <div v-if="submitted && $v.ilyas.hkerja.$error" class="invalid-feedback">
              <span v-if="!$v.ilyas.hkerja.required">Jumlah hari kerja setahun harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jam kerja / hari</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ilyas.jkerja.$error }"
              name="jkerja"
              v-model="ilyas.jkerja"
              placeholder="Jam kerja perhari"
            />
            <div v-if="submitted && $v.ilyas.jkerja.$error" class="invalid-feedback">
              <span v-if="!$v.ilyas.jkerja.required">Jam kerja / hari harus terisi</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-5" v-if="hasilnya && submitted">
            <div class="card text-white bg-success text-center">
              <div class="card-header">Hasil perhitungan dengan metode Ilyas</div>
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
      <button type="button" @click="reLoad" class="btn btn-secondary">Refresh</button>
      <button type="button" @click="onHitung" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators"
export default {
  data() {
    return {
      ilyas: {
        jperawatan: "",
        sharian: "",
        hkerja: "",
        jkerja: ""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    ilyas: {
      jperawatan: { required },
      sharian: { required },
      jkerja: { required },
      hkerja: { required }
    }
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }

      const atas =
        parseInt(this.ilyas.jperawatan) *
        parseInt(this.ilyas.sharian) *
        parseInt(this.ilyas.hkerja)
      const bawah = 255 * parseInt(this.ilyas.jkerja)
      const hasil = atas / bawah

      console.log(atas);
      console.log(bawah);
      
      this.hasilakhir = hasil.toFixed(2)
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