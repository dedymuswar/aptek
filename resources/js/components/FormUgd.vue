<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="mb-5" v-if="hasilnya && submitted">
          <div class="card text-white bg-success text-center">
            <div class="card-header">Hasil perhitungan dengan metode DEPKES - UGD</div>
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
            <label class="control-label">Rata-rata jumlah pasien / hari</label>
            <input
              type="number"
              name="rapas"
              v-model="ugd.rapas"
              class="form-control rapas"
              :class="{ 'is-invalid': submitted && $v.ugd.rapas.$error }"
              placeholder="Rata rata pasien perhari"
            />
            <div v-if="submitted && $v.ugd.rapas.$error" class="invalid-feedback">
              <span v-if="!$v.ugd.rapas.required">Rata rata pasien perhari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah Perawatan / hari</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ugd.jupar.$error }"
              name="jupar"
              v-model="ugd.jupar"
              placeholder="Jumlah Perawatan / hari"
            />
            <div v-if="submitted && $v.ugd.jupar.$error" class="invalid-feedback">
              <span v-if="!$v.ugd.jupar.required">Jumlah Perawatan / hari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jam kerja efektif</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ugd.jke.$error }"
              name="jke"
              v-model="ugd.jke"
              placeholder="Jam kerja efektif"
            />
            <div v-if="submitted && $v.ugd.jke.$error" class="invalid-feedback">
              <span v-if="!$v.ugd.jke.required">Jam kerja efektif harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jam minggu efektif</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.ugd.jme.$error }"
              name="jme"
              v-model="ugd.jme"
              placeholder="Jam minggu efektif"
            />
            <div v-if="submitted && $v.ugd.jme.$error" class="invalid-feedback">
              <span v-if="!$v.ugd.jme.required">Jam minggu efektif harus terisi</span>
            </div>
          </div>
          <button type="button" @click="reLoad" class="btn btn-secondary">Refresh</button>
          <button type="button" @click="onHitung" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-6">


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
      ugd: {
        rapas: "",
        jupar: "",
        jke: "",
        jme:""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    ugd: {
      rapas: { required },
      jupar: { required },
      jke: { required },
      jme: { required }
    }
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }
      // 15288 atas
      const atas = parseInt(this.ugd.jupar) * 52 * 7 * parseInt(this.ugd.rapas)
      console.log(atas)

      // 280 bawah
      const bawah = parseInt(this.ugd.jme) * 40
      console.log(bawah)

      const suba = atas / bawah 
      this.hasilakhir = suba.toFixed(2)
      //   console.log(hasilakhir)
      this.hasilnya = true
    },
    reLoad() {
      this.ugd = {}
      this.hasilnya = false
    }
  }
}
</script>

<style>
</style>