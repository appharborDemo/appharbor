using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Cors;
using WebService.Models;

namespace WebService.Controllers
{
    [EnableCors(origins: "*", headers: "*", methods: "*")]
    public class HomeAPIController : ApiController
    {
        #region Helper
        public HttpResponseMessage CreateResponse<T>(HttpStatusCode statusCode, T data)
        {
            return Request.CreateResponse(statusCode, data);
        }
        public HttpResponseMessage CreateResponse(HttpStatusCode statusCode)
        {
            return Request.CreateResponse(statusCode);


        }

        #endregion

        [HttpGet]
        [Route("api/home/all")]
        public IHttpActionResult GetAll()
        {
            using (QuanLyBanSachEntities ctx = new QuanLyBanSachEntities())
            {
                List<Sach> list = ctx.Saches.ToList();
                Mapper.CreateMap<Sach, SachModel>();
                List<SachModel> ret = Mapper.Map<List<Sach>, List<SachModel>>(list);
                return Ok(ret);
            }
        }

        [HttpGet]
        [Route("api/home/detail")]
        public HttpResponseMessage detail([FromUri] int MaSach)
        {
            using (QuanLyBanSachEntities ctx = new QuanLyBanSachEntities())
            {
                var sach = ctx.Saches.Where(sv => sv.MaSach == MaSach).FirstOrDefault();
                if (sach == null)
                {
                    return CreateResponse(HttpStatusCode.BadRequest);
                }
                Mapper.CreateMap<Sach, SachModel>();
                var ret = Mapper.Map<Sach, SachModel>(sach);
                return CreateResponse(HttpStatusCode.OK, ret);
            }
        }

        [HttpGet]
        [Route("api/home/allchude")]
        public IHttpActionResult GetAllChuDe()
        {
            using (QuanLyBanSachEntities ctx = new QuanLyBanSachEntities())
            {
                List<ChuDe> list = ctx.ChuDes.ToList();
                Mapper.CreateMap<ChuDe, ChuDeModel>();
                List<ChuDeModel> ret = Mapper.Map<List<ChuDe>, List<ChuDeModel>>(list);
                return Ok(ret);
            }
        }

        [HttpGet]
        [Route("api/home/allnhaxuatban")]
        public IHttpActionResult GetAllNhaXuatBan()
        {
            using (QuanLyBanSachEntities ctx = new QuanLyBanSachEntities())
            {
                List<NhaXuatBan> list = ctx.NhaXuatBans.ToList();
                Mapper.CreateMap<NhaXuatBan, NhaXuatBanModel>();
                List<NhaXuatBanModel> ret = Mapper.Map<List<NhaXuatBan>, List<NhaXuatBanModel>>(list);
                return Ok(ret);
            }
        }

        [HttpGet]
        [Route("api/home/alltacgia")]
        public IHttpActionResult GetAllTacGia()
        {
            using (QuanLyBanSachEntities ctx = new QuanLyBanSachEntities())
            {
                List<TacGia> list = ctx.TacGias.ToList();
                Mapper.CreateMap<TacGia, TacGiaModel>();
                List<TacGiaModel> ret = Mapper.Map<List<TacGia>, List<TacGiaModel>>(list);
                return Ok(ret);
            }
        }
    }
}
