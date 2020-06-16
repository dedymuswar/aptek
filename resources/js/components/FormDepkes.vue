<template>
  <div>
    <div class="row">
      <div class="col-sm-6">
        <form @submit.prevent>
          <div class="form-group">
            <label class="control-label">Jam Perawatan</label>
            <input
              type="text"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.depkes.jperawatan.$error }"
              name="jperawatan"
              v-model="depkes.jperawatan"
              placeholder="Waktu perawatan yang dibutuhkan pasien"
            />
            <div v-if="submitted && $v.depkes.jperawatan.$error" class="invalid-feedback">
              <span
                v-if="!$v.depkes.jperawatan.required"
              >Waktu perawatan yang dibutuhkan pasien harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">52 Minggu</label>
            <input
              type="text"
              name="m52"
              v-model="depkes.m52"
              :class="{ 'is-invalid': submitted && $v.depkes.m52.$error }"
              class="form-control"
              placeholder="52 Minggu"
            />
            <div v-if="submitted && $v.depkes.m52.$error" class="invalid-feedback">
              <span v-if="!$v.depkes.m52.required">field 52 Minggu harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">7 Hari</label>
            <input
              type="text"
              name="hari7"
              v-model="depkes.hari7"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.depkes.hari7.$error }"
              placeholder="7 Hari"
            />
            <div v-if="submitted && $v.depkes.hari7.$error" class="invalid-feedback">
              <span v-if="!$v.depkes.hari7.required">field 7 Hari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Tempat Tidur (TT)</label>
            <input
              type="text"
              name="tt"
              v-model="depkes.tt"
              :class="{ 'is-invalid': submitted && $v.depkes.tt.$error }"
              class="form-control"
              placeholder="jumlah tempat tidur"
            />
            <div v-if="submitted && $v.depkes.tt.$error" class="invalid-feedback">
              <span v-if="!$v.depkes.tt.required">jumlah tempat tidur harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Bed Occupation Rate (BOR)</label>
            <input
              type="text"
              name="bor"
              v-model="depkes.bor"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.depkes.bor.$error }"
              placeholder="jumlah Bed Occupation Rate"
            />
            <div v-if="submitted && $v.depkes.bor.$error" class="invalid-feedback">
              <span v-if="!$v.depkes.bor.required">jumlah Bed Occupation Rate harus terisi</span>
            </div>
          </div>
          <button type="button" @click="reLoad" class="btn btn-secondary">Refresh</button>
          <button type="button" @click="onHitung" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-sm-6">
          <div class="mb-5" v-if="hasilnya && submitted">
            <div class="card text-white bg-success text-center">
              <div class="card-header">Hasil perhitungan dengan metode DEPKES</div>
              <div class="card-body text-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
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
      depkes: {
        jperawatan: "",
        m52: "",
        hari7: "",
        tt: "",
        bor: ""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    depkes: {
      jperawatan: { required },
      m52: { required },
      hari7: { required },
      tt: { required },
      bor: { required }
    }
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }

      //   const AB365 =
      //     parseInt(this.gillies.jperawatan) *
      //     parseInt(this.gillies.sharian) *
      //     parseInt(this.gillies.perhari)
      //   const C363JamKerja =
      //     (parseInt(this.gillies.perhari) - parseInt(this.gillies.hlibur)) *
      //     parseInt(this.gillies.perhari)
      //   const hasil = AB365 / C363JamKerja
      //   this.hasilakhir = hasil.toFixed(2)
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