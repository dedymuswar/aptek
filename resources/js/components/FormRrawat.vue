<template>
  <div>
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <div class="mb-5" v-if="hasilnya && submitted">
            <div class="card text-white bg-success text-center">
              <div class="card-header">Hasil perhitungan dengan metode DEPKES Ruangan rawat</div>
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
    <form @submit.prevent>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label">Rata-rata jam perawatan pasien per hari</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.rrawat.rajam.$error }"
              name="rajam"
              v-model="rrawat.rajam"
              placeholder="Rata-rata jam perawatan pasien per hari"
            />
            <div v-if="submitted && $v.rrawat.rajam.$error" class="invalid-feedback">
              <span
                v-if="!$v.rrawat.rajam.required"
              >Rata-rata jam perawatan pasien per hari harus diisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah Pasien</label>
            <input
              type="number"
              name="jupas"
              v-model="rrawat.jupas"
              :class="{ 'is-invalid': submitted && $v.rrawat.jupas.$error }"
              class="form-control"
              placeholder="Jumlah Pasien"
            />
            <div v-if="submitted && $v.rrawat.jupas.$error" class="invalid-feedback">
              <span v-if="!$v.rrawat.jupas.required">field Jumlah pasien harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah Kerja Efektif</label>
            <input
              type="number"
              name="jke"
              v-model="rrawat.jke"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.rrawat.jke.$error }"
              placeholder="Jumlah kerja efektif"
            />
            <div v-if="submitted && $v.rrawat.jke.$error" class="invalid-feedback">
              <span v-if="!$v.rrawat.jke.required">field Jumlah kerja efektif harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Jumlah minggu dalam setahun</label>
            <input
              type="number"
              name="juming"
              v-model="rrawat.juming"
              :class="{ 'is-invalid': submitted && $v.rrawat.juming.$error }"
              class="form-control"
              placeholder="jumlah minggu dalam setahun"
            />
            <div v-if="submitted && $v.rrawat.juming.$error" class="invalid-feedback">
              <span v-if="!$v.rrawat.juming.required">jumlah minggu dalam setahun harus terisi</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="control-label">Libur Besar</label>
            <input
              type="number"
              name="lisar"
              v-model="rrawat.lisar"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.rrawat.lisar.$error }"
              placeholder="Libur Besar"
            />
            <div v-if="submitted && $v.rrawat.lisar.$error" class="invalid-feedback">
              <span v-if="!$v.rrawat.lisar.required">Libur Besar harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Cuti Tahunan</label>
            <input
              type="number"
              class="form-control"
              :class="{ 'is-invalid': submitted && $v.rrawat.cutan.$error }"
              name="cutan"
              v-model="rrawat.cutan"
              placeholder="Cuti Tahunan"
            />
            <div v-if="submitted && $v.rrawat.cutan.$error" class="invalid-feedback">
              <span v-if="!$v.rrawat.cutan.required">Cuti Tahunan harus terisi</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Hari Kerja Efektif</label>
            <input
              type="number"
              name="hke"
              v-model="rrawat.hke"
              :class="{ 'is-invalid': submitted && $v.rrawat.hke.$error }"
              class="form-control"
              placeholder="Hari Kerja Efektif"
            />
            <div v-if="submitted && $v.rrawat.hke.$error" class="invalid-feedback">
              <span v-if="!$v.rrawat.hke.required">field Hari kerja efektif harus terisi</span>
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
      rrawat: {
        rajam: "",
        jupas: "",
        jke: "",
        juming: "",
        lisar: "",
        cutan: "",
        hke: ""
      },
      hasilnya: false,
      hasilakhir: "",
      submitted: false
    }
  },
  validations: {
    rrawat: {
      rajam: { required },
      jupas: { required },
      jke: { required },
      juming: { required },
      lisar: { required },
      cutan: { required },
      hke: { required }
    }
  },
  methods: {
    onHitung() {
      this.submitted = true
      this.$v.$touch()
      if (this.$v.$invalid) {
        return
      }

        const jupar = parseFloat(this.rrawat.rajam) *  parseFloat(this.rrawat.jupas)
        const bagiatas = parseFloat(this.rrawat.juming) + parseFloat(this.rrawat.cutan) + parseFloat(this.rrawat.lisar)
        const bagibawah = parseFloat(this.rrawat.hke)
        const loday = bagiatas / bagibawah * jupar
        const hasil = (jupar + loday) * 25 / 100
        this.hasilakhir = hasil.toFixed(2)
        
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
      this.rrawat = {}
      this.hasilnya = false
    }
  }
}
</script>

<style>
</style>