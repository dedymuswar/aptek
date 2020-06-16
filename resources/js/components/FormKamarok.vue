<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="mb-5" v-if="hasilnya && submitted">
          <div class="card text-white bg-success text-center">
            <div class="card-header">Hasil perhitungan dengan metode DEPKES - Kamar OK</div>
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
            <label class="control-label">Jumlah pasien operasi (besar)</label>
            <input
              type="number"
              name="jupaso"
              v-model="kamarok.jupaso"
              class="form-control jupaso"
              :class="{ 'is-invalid': submitted && $v.kamarok.jupaso.$error }"
              placeholder="Jumlah pasien operasi (besar)"
            />
            <div v-if="submitted && $v.kamarok.jupaso.$error" class="invalid-feedback">
              <span v-if="!$v.kamarok.jupaso.required">Jumlah pasien operasi (besar) harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah pasien operasi (sedang)</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.kamarok.jupase.$error }"
              name="jupase"
              v-model="kamarok.jupase"
              placeholder="Jumlah pasien operasi (sedang)"
            />
            <div v-if="submitted && $v.kamarok.jupase.$error" class="invalid-feedback">
              <span v-if="!$v.kamarok.jupase.required">Jumlah pasien operasi (sedang) harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah pasien operasi (kecil)</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.kamarok.jupasi.$error }"
              name="jupasi"
              v-model="kamarok.jupasi"
              placeholder="Jumlah pasien operasi (kecil)"
            />
            <div v-if="submitted && $v.kamarok.jupasi.$error" class="invalid-feedback">
              <span v-if="!$v.kamarok.jupasi.required">Jumlah pasien operasi (kecil) harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Lama operasi (besar)</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.kamarok.lamobe.$error }"
              name="lamobe"
              v-model="kamarok.lamobe"
              placeholder="Lama operasi (besar)"
            />
            <div v-if="submitted && $v.kamarok.lamobe.$error" class="invalid-feedback">
              <span v-if="!$v.kamarok.lamobe.required">Lama operasi (besar) harus terisi</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label">Lama operasi (sedang)</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.kamarok.lamose.$error }"
              name="lamose"
              v-model="kamarok.lamose"
              placeholder="Lama operasi (sedang)"
            />
            <div v-if="submitted && $v.kamarok.lamose.$error" class="invalid-feedback">
              <span v-if="!$v.kamarok.lamose.required">Lama operasi (sedang) harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Lama operasi (kecil)</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.kamarok.lamoci.$error }"
              name="lamoci"
              v-model="kamarok.lamoci"
              placeholder="Lama operasi (kecil)"
            />
            <div v-if="submitted && $v.kamarok.lamoci.$error" class="invalid-feedback">
              <span v-if="!$v.kamarok.lamoci.required">Lama operasi (kecil) harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah tenaga perawat / tim</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.kamarok.jutepa.$error }"
              name="jutepa"
              v-model="kamarok.jutepa"
              placeholder="Jumlah tenaga perawat / tim"
            />
            <div v-if="submitted && $v.kamarok.jutepa.$error" class="invalid-feedback">
              <span v-if="!$v.kamarok.jutepa.required">Jumlah tenaga perawat / tim harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah kerja efektif</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.kamarok.jke.$error }"
              name="jke"
              v-model="kamarok.jke"
              placeholder="Jumlah kerja efektif"
            />
            <div v-if="submitted && $v.kamarok.jke.$error" class="invalid-feedback">
              <span v-if="!$v.kamarok.jke.required">Jumlah kerja efektif harus terisi</span>
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
      kamarok: {
        jupaso: "",
        jupase: "",
        jupasi: "",
        lamobe: "",
        lamose: "",
        lamoci: "",
        jutepa: "",
        jke: ""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    kamarok: {
      jupaso: { required },
      jupase: { required },
      jupasi: { required },
      lamobe: { required },
      lamose: { required },
      lamoci: { required },
      jutepa: { required },
      jke: { required }
    }
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }

      const atasatu =
        parseInt(this.kamarok.jupaso) * parseInt(this.kamarok.lamobe)
      const atadua =
        parseInt(this.kamarok.jupase) * parseInt(this.kamarok.lamose)
      const atatiga =
        parseInt(this.kamarok.jupasi) * parseInt(this.kamarok.lamoci)

      const japera = atasatu + atadua + atatiga

      const batassatu = japera + parseInt(this.kamarok.jutepa)

      const hasil = batassatu / parseInt(this.kamarok.jke)
      this.hasilakhir = hasil.toFixed(2)
      this.hasilnya = true
    },
    reLoad() {
      this.kamarok = {}
      this.hasilnya = false
    }
  }
}
</script>

<style>
</style>