<template>
  <div>
    <form @submit.prevent>
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <div class="mb-5" v-if="hasilnya && submitted">
            <div class="card text-white bg-success text-center">
              <div class="card-header">Hasil perhitungan dengan metode Doughlas</div>
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
      <div class="row">
        <div class="col-sm-4">
          <h3 class="mb-3">Minimal</h3>
          <div class="form-group">
            <label class="control-label">Pagi</label>
            <input
              type="number"
              class="form-control"
              name="mpagi"
              v-model="minimal.mpagi"
              :class="{ 'is-invalid': submitted && $v.minimal.mpagi.$error }"
              placeholder="Jumlah pasien x 0.17"
            />
            <div v-if="submitted && $v.minimal.mpagi.$error" class="invalid-feedback">
              <span v-if="!$v.minimal.mpagi.required">Jam kerja / hari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Siang</label>
            <input
              type="number"
              class="form-control"
              name="msiang"
              v-model="minimal.msiang"
              :class="{ 'is-invalid': submitted && $v.minimal.msiang.$error }"
              placeholder="Jumlah pasien x 0.14"
            />
            <div v-if="submitted && $v.minimal.msiang.$error" class="invalid-feedback">
              <span v-if="!$v.minimal.msiang.required">Jam kerja / hari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Malam</label>
            <input
              type="number"
              class="form-control"
              name="mmalam"
              v-model="minimal.mmalam"
              :class="{ 'is-invalid': submitted && $v.minimal.mmalam.$error }"
              placeholder="Jumlah pasien x 0.07"
            />
            <div v-if="submitted && $v.minimal.mmalam.$error" class="invalid-feedback">
              <span v-if="!$v.minimal.mmalam.required">Jam kerja / hari harus terisi</span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <h3 class="mb-3">Parsial</h3>
          <div class="form-group">
            <label class="control-label">Pagi</label>
            <input
              type="number"
              class="form-control"
              name="ppagi"
              v-model="parsial.ppagi"
              :class="{ 'is-invalid': submitted && $v.parsial.ppagi.$error }"
              placeholder="Jumlah pasien x 0.27"
            />
            <div v-if="submitted && $v.parsial.ppagi.$error" class="invalid-feedback">
              <span v-if="!$v.parsial.ppagi.required">Jam kerja / hari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Siang</label>
            <input
              type="number"
              class="form-control"
              name="psiang"
              v-model="parsial.psiang"
              :class="{ 'is-invalid': submitted && $v.parsial.psiang.$error }"
              placeholder="Jumlah pasien x 0.15"
            />
            <div v-if="submitted && $v.parsial.psiang.$error" class="invalid-feedback">
              <span v-if="!$v.parsial.psiang.required">Jam kerja / hari harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Malam</label>
            <input
              type="number"
              class="form-control"
              name="pmalam"
              v-model="parsial.pmalam"
              :class="{ 'is-invalid': submitted && $v.parsial.pmalam.$error }"
              placeholder="Jumlah pasien x 0.10"
            />
            <div v-if="submitted && $v.parsial.pmalam.$error" class="invalid-feedback">
              <span v-if="!$v.parsial.pmalam.required">Jam kerja / hari harus terisi</span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <h3 class="mb-3">Total</h3>
          <div class="form-group">
            <label class="control-label">Pagi</label>
            <input
              type="number"
              class="form-control"
              name="tpagi"
              v-model="dpagi"
              value="0"
              readonly
            />
          </div>
          <div class="form-group">
            <label class="control-label">Siang</label>
            <input
              type="number"
              class="form-control"
              name="tsiang"
              v-model="dsiang"
              value="0"
              readonly
            />
          </div>
          <div class="form-group">
            <label class="control-label">Malam</label>
            <input
              type="number"
              class="form-control"
              name="tmalam"
              v-model="dmalam"
              value="0"
              readonly
            />
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
      minimal: {
        mpagi: "",
        msiang: "",
        mmalam: ""
      },
      parsial: {
        ppagi: "",
        psiang: "",
        pmalam: ""
      },
      total: {
        tpagi: "",
        tsiang: "",
        tmalam: ""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    minimal: {
      mpagi: { required },
      msiang: { required },
      mmalam: { required }
    },
    parsial: {
      ppagi: { required },
      psiang: { required },
      pmalam: { required }
    }
  },
  computed: {
    dpagi() {
      const dpagi =
        parseInt(this.minimal.mpagi) * 0.17 +
        parseInt(this.parsial.ppagi) * 0.27
      return dpagi.toFixed(2)
    },
    dsiang() {
      const dsiang =
        parseInt(this.minimal.msiang) * 0.14 +
        parseInt(this.parsial.psiang) * 0.15
      return dsiang.toFixed(2)
    },
    dmalam() {
      const dmalam =
        parseInt(this.minimal.mmalam) * 0.07 +
        parseInt(this.parsial.pmalam) * 0.1
      return dmalam.toFixed(2)
    }
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }

      const total =
        parseFloat(this.dpagi) +
        parseFloat(this.dsiang) +
        parseFloat(this.dmalam)
      this.hasilakhir = total.toFixed(2)
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