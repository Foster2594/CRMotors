USE [master]
GO
/****** Object:  Database [RMClient]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE DATABASE [RMClient]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'RMClient', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\RMClient.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'RMClient_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\RMClient_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [RMClient] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [RMClient].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [RMClient] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [RMClient] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [RMClient] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [RMClient] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [RMClient] SET ARITHABORT OFF 
GO
ALTER DATABASE [RMClient] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [RMClient] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [RMClient] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [RMClient] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [RMClient] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [RMClient] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [RMClient] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [RMClient] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [RMClient] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [RMClient] SET  DISABLE_BROKER 
GO
ALTER DATABASE [RMClient] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [RMClient] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [RMClient] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [RMClient] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [RMClient] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [RMClient] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [RMClient] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [RMClient] SET RECOVERY FULL 
GO
ALTER DATABASE [RMClient] SET  MULTI_USER 
GO
ALTER DATABASE [RMClient] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [RMClient] SET DB_CHAINING OFF 
GO
ALTER DATABASE [RMClient] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [RMClient] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [RMClient] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'RMClient', N'ON'
GO
ALTER DATABASE [RMClient] SET QUERY_STORE = OFF
GO
USE [RMClient]
GO
/****** Object:  Table [dbo].[Empleado]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Empleado](
	[idEmpleado] [int] NOT NULL,
	[cedula] [varchar](30) NOT NULL,
	[nombre] [varchar](30) NOT NULL,
	[apellido1] [varchar](30) NOT NULL,
	[apellido2] [varchar](30) NULL,
	[idGenero] [char](1) NOT NULL,
	[telefonoCelular] [varchar](20) NOT NULL,
	[otroTelefono] [varchar](20) NULL,
	[correo] [varchar](50) NOT NULL,
	[idProvincia] [int] NOT NULL,
	[idCanton] [int] NOT NULL,
	[idDistrito] [int] NOT NULL,
	[direccionExacta] [varchar](300) NOT NULL,
	[idSede] [int] NOT NULL,
	[idDepartamento] [int] NOT NULL,
	[idUsuario] [int] NOT NULL,
	[idEstadoEmpleado] [int] NOT NULL,
 CONSTRAINT [pkEmpleado] PRIMARY KEY CLUSTERED 
(
	[idEmpleado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Campana]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Campana](
	[idCampana] [int] NOT NULL,
	[idTipoCampana] [int] NOT NULL,
	[idSede] [int] NOT NULL,
	[idEstadoCampana] [int] NOT NULL,
	[nombre] [varchar](30) NOT NULL,
	[descripcion] [varchar](200) NOT NULL,
	[idProvincia] [int] NOT NULL,
	[idCanton] [int] NOT NULL,
	[fechaInicio] [date] NOT NULL,
	[fechaFinal] [date] NOT NULL,
	[descuentoMinimo] [decimal](18, 0) NOT NULL,
	[descuentoMaximo] [decimal](18, 0) NOT NULL,
	[idEmpleadoCreador] [int] NOT NULL,
	[idEmpleadoAprobador] [int] NULL,
 CONSTRAINT [pkCampana] PRIMARY KEY CLUSTERED 
(
	[idCampana] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoCotizacion]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoCotizacion](
	[idEstadoCotizacion] [int] NOT NULL,
	[nombre] [varchar](15) NOT NULL,
 CONSTRAINT [pkEstadoCotizacion] PRIMARY KEY CLUSTERED 
(
	[idEstadoCotizacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EncabezadoCotizacion]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EncabezadoCotizacion](
	[idEncabezadoCotizacion] [int] NOT NULL,
	[fechaCreacion] [datetime] NOT NULL,
	[idCliente] [int] NOT NULL,
	[idEmpleado] [int] NOT NULL,
	[numeroLineas] [int] NOT NULL,
	[idCampana] [int] NOT NULL,
	[idEstadoCotizacion] [int] NOT NULL,
	[subTotal] [decimal](18, 0) NOT NULL,
	[montoDescuento] [decimal](18, 0) NOT NULL,
	[impuestoVentas] [decimal](18, 0) NOT NULL,
	[total] [decimal](18, 0) NOT NULL,
 CONSTRAINT [pkEncabezadoCotizacion] PRIMARY KEY CLUSTERED 
(
	[idEncabezadoCotizacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Cliente]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Cliente](
	[idCliente] [int] NOT NULL,
	[idTipoCliente] [int] NOT NULL,
	[cedula] [varchar](30) NOT NULL,
	[nombre] [varchar](30) NOT NULL,
	[apellido1] [varchar](30) NOT NULL,
	[apellido2] [varchar](30) NULL,
	[idGenero] [char](1) NOT NULL,
	[idOcupacion] [int] NOT NULL,
	[numeroCelular] [varchar](20) NOT NULL,
	[otroTelefono] [varchar](20) NULL,
	[correo] [varchar](50) NOT NULL,
	[fechaNacimiento] [date] NOT NULL,
	[ingresoSalarial] [decimal](18, 0) NULL,
	[idProvincia] [int] NOT NULL,
	[idCanton] [int] NOT NULL,
	[idDistrito] [int] NOT NULL,
	[direccionExacta] [varchar](300) NULL,
	[idVehiculoInteres] [int] NOT NULL,
	[idEstadoCliente] [int] NOT NULL,
 CONSTRAINT [pkCliente] PRIMARY KEY CLUSTERED 
(
	[idCliente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  View [dbo].[vHistoricoCotizaciones]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create view [dbo].[vHistoricoCotizaciones] as 
select ec1.idEncabezadoCotizacion Número,ec1.fechaCreacion 'Fecha de Creacion',
c1.cedula 'Cedula Cliente',e.cedula 'Cedula Empleado',
c2.nombre 'Campaña',ec2.nombre 'Estado',ec1.subTotal,ec1.montoDescuento 'Monto Descuento',ec1.impuestoVentas 'Impuesto Ventas',ec1.total Total
from EncabezadoCotizacion ec1, Cliente c1, Empleado e, Campana c2, EstadoCotizacion ec2
where ec1.idCliente = c1.idCliente
and ec1.idEmpleado = e.idEmpleado
and ec1.idCampana = c2.idCampana
and ec1.idEstadoCotizacion = ec2.idEstadoCotizacion;
GO
/****** Object:  Table [dbo].[Bitacora]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Bitacora](
	[idBitacora] [int] IDENTITY(1,1) NOT NULL,
	[idUsuarioCreacion] [int] NOT NULL,
	[idUsuarioModificacion] [int] NOT NULL,
	[fechaCreacion] [datetime] NOT NULL,
	[fechaModificacion] [datetime] NOT NULL,
	[transaccion] [varchar](300) NOT NULL,
 CONSTRAINT [pkBitacora] PRIMARY KEY CLUSTERED 
(
	[idBitacora] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Canton]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Canton](
	[idCanton] [int] NOT NULL,
	[idProvincia] [int] NOT NULL,
	[nombre] [varchar](20) NOT NULL,
 CONSTRAINT [pkCantonProvincia] PRIMARY KEY CLUSTERED 
(
	[idCanton] ASC,
	[idProvincia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Departamento]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Departamento](
	[idDepartamento] [int] NOT NULL,
	[nombre] [varchar](30) NOT NULL,
	[idSede] [int] NOT NULL,
 CONSTRAINT [pkDepartamentoSede] PRIMARY KEY CLUSTERED 
(
	[idDepartamento] ASC,
	[idSede] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DetalleCotizacion]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DetalleCotizacion](
	[idDetalleCotizacion] [int] NOT NULL,
	[idEncabezadoCotizacion] [int] NOT NULL,
	[idVehiculo] [int] NOT NULL,
	[cantidad] [int] NOT NULL,
	[porcentajeDescuento] [decimal](18, 0) NOT NULL,
	[precio] [decimal](18, 0) NOT NULL,
	[montoDescuento] [decimal](18, 0) NOT NULL,
	[montoImpuesto] [decimal](18, 0) NOT NULL,
	[montoTotal] [decimal](18, 0) NOT NULL,
 CONSTRAINT [pkDetalleCotizacion] PRIMARY KEY CLUSTERED 
(
	[idDetalleCotizacion] ASC,
	[idEncabezadoCotizacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Distrito]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Distrito](
	[idDistrito] [int] NOT NULL,
	[idCanton] [int] NOT NULL,
	[idProvincia] [int] NOT NULL,
	[nombre] [varchar](30) NOT NULL,
 CONSTRAINT [pkCantonDistrito] PRIMARY KEY CLUSTERED 
(
	[idDistrito] ASC,
	[idCanton] ASC,
	[idProvincia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoCampana]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoCampana](
	[idEstadoCampana] [int] NOT NULL,
	[nombre] [varchar](15) NOT NULL,
 CONSTRAINT [pkEstadoCampana] PRIMARY KEY CLUSTERED 
(
	[idEstadoCampana] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoCliente]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoCliente](
	[idEstadoCliente] [int] NOT NULL,
	[nombre] [varchar](30) NOT NULL,
 CONSTRAINT [pkEstadoCliente] PRIMARY KEY CLUSTERED 
(
	[idEstadoCliente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoEmpleado]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoEmpleado](
	[idEstadoEmpleado] [int] NOT NULL,
	[nombre] [varchar](15) NOT NULL,
 CONSTRAINT [pkEstadoEmpleado] PRIMARY KEY CLUSTERED 
(
	[idEstadoEmpleado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoProveedor]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoProveedor](
	[idEstadoProveedor] [int] NOT NULL,
	[nombre] [varchar](15) NOT NULL,
 CONSTRAINT [pkEstadoProveedor] PRIMARY KEY CLUSTERED 
(
	[idEstadoProveedor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoSede]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoSede](
	[idEstadoSede] [int] NOT NULL,
	[nombre] [varchar](15) NOT NULL,
 CONSTRAINT [pkEstadoSede] PRIMARY KEY CLUSTERED 
(
	[idEstadoSede] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoUsuario]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoUsuario](
	[idEstadoUsuario] [int] NOT NULL,
	[nombre] [varchar](15) NOT NULL,
 CONSTRAINT [pkEstadoUsuario] PRIMARY KEY CLUSTERED 
(
	[idEstadoUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Genero]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Genero](
	[idGenero] [char](1) NOT NULL,
	[nombre] [varchar](10) NOT NULL,
 CONSTRAINT [pkGenero] PRIMARY KEY CLUSTERED 
(
	[idGenero] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Ocupacion]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Ocupacion](
	[idOcupacion] [int] NOT NULL,
	[nombre] [varchar](100) NOT NULL,
 CONSTRAINT [pkOcupacion] PRIMARY KEY CLUSTERED 
(
	[idOcupacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[password_resets]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[password_resets](
	[email] [nvarchar](255) NOT NULL,
	[token] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[permission_role]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[permission_role](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[permission_id] [bigint] NOT NULL,
	[role_id] [bigint] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[permission_user]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[permission_user](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[permission_id] [bigint] NOT NULL,
	[user_id] [bigint] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[permissions]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[permissions](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[slug] [nvarchar](255) NOT NULL,
	[description] [nvarchar](max) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Proveedor]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Proveedor](
	[idProveedor] [int] NOT NULL,
	[cedula] [varchar](30) NOT NULL,
	[nombre] [varchar](100) NOT NULL,
	[numeroTelefono] [varchar](15) NOT NULL,
	[correo] [varchar](50) NOT NULL,
	[idEstadoProveedor] [int] NOT NULL,
 CONSTRAINT [pkProveedor] PRIMARY KEY CLUSTERED 
(
	[idProveedor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Provincia]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Provincia](
	[idProvincia] [int] NOT NULL,
	[nombre] [varchar](10) NOT NULL,
 CONSTRAINT [pkProvincia] PRIMARY KEY CLUSTERED 
(
	[idProvincia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[role_user]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[role_user](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[role_id] [bigint] NOT NULL,
	[user_id] [bigint] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[roles]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[roles](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[slug] [nvarchar](255) NOT NULL,
	[description] [nvarchar](max) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[special] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Sede]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Sede](
	[idSede] [int] NOT NULL,
	[nombre] [varchar](30) NOT NULL,
	[telefono] [varchar](20) NOT NULL,
	[correo] [varchar](50) NOT NULL,
	[idProvincia] [int] NOT NULL,
	[idCanton] [int] NOT NULL,
	[idDistrito] [int] NOT NULL,
	[direccionExacta] [varchar](300) NOT NULL,
	[idEstadoSede] [int] NOT NULL,
 CONSTRAINT [pkSede] PRIMARY KEY CLUSTERED 
(
	[idSede] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TipoCampana]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TipoCampana](
	[idTipoCampana] [int] NOT NULL,
	[nombre] [varchar](30) NOT NULL,
 CONSTRAINT [pkTipoCampana] PRIMARY KEY CLUSTERED 
(
	[idTipoCampana] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TipoCliente]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TipoCliente](
	[idTipoCliente] [int] NOT NULL,
	[nombre] [varchar](30) NOT NULL,
 CONSTRAINT [pkTipoCliente] PRIMARY KEY CLUSTERED 
(
	[idTipoCliente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TipoVehiculo]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TipoVehiculo](
	[idTipoVehiculo] [int] NOT NULL,
	[nombre] [varchar](30) NOT NULL,
 CONSTRAINT [pkTipoVehiculo] PRIMARY KEY CLUSTERED 
(
	[idTipoVehiculo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](255) NOT NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Usuario]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Usuario](
	[idUsuario] [int] NOT NULL,
	[usuario] [varchar](30) NOT NULL,
	[clave] [varchar](30) NOT NULL,
	[correo] [varchar](50) NOT NULL,
	[idEstadoUsuario] [int] NOT NULL,
 CONSTRAINT [pkUsuario] PRIMARY KEY CLUSTERED 
(
	[idUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Vehiculo]    Script Date: 22-Nov-19 10:30:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Vehiculo](
	[idVehiculo] [int] NOT NULL,
	[idProveedor] [int] NOT NULL,
	[idTipoVehiculo] [int] NOT NULL,
	[codigo] [varchar](50) NOT NULL,
	[marca] [varchar](50) NOT NULL,
	[modelo] [varchar](50) NOT NULL,
	[parametroVersion] [varchar](50) NOT NULL,
	[annio] [int] NOT NULL,
	[cantidadDisponible] [int] NOT NULL,
	[fechaIngreso] [date] NOT NULL,
	[fechaSalida] [date] NULL,
 CONSTRAINT [pkVehiculo] PRIMARY KEY CLUSTERED 
(
	[idVehiculo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [password_resets_email_index]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE NONCLUSTERED INDEX [password_resets_email_index] ON [dbo].[password_resets]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [permission_role_permission_id_index]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE NONCLUSTERED INDEX [permission_role_permission_id_index] ON [dbo].[permission_role]
(
	[permission_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [permission_role_role_id_index]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE NONCLUSTERED INDEX [permission_role_role_id_index] ON [dbo].[permission_role]
(
	[role_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [permission_user_permission_id_index]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE NONCLUSTERED INDEX [permission_user_permission_id_index] ON [dbo].[permission_user]
(
	[permission_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [permission_user_user_id_index]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE NONCLUSTERED INDEX [permission_user_user_id_index] ON [dbo].[permission_user]
(
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [permissions_slug_unique]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE UNIQUE NONCLUSTERED INDEX [permissions_slug_unique] ON [dbo].[permissions]
(
	[slug] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [role_user_role_id_index]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE NONCLUSTERED INDEX [role_user_role_id_index] ON [dbo].[role_user]
(
	[role_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [role_user_user_id_index]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE NONCLUSTERED INDEX [role_user_user_id_index] ON [dbo].[role_user]
(
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [roles_name_unique]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE UNIQUE NONCLUSTERED INDEX [roles_name_unique] ON [dbo].[roles]
(
	[name] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [roles_slug_unique]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE UNIQUE NONCLUSTERED INDEX [roles_slug_unique] ON [dbo].[roles]
(
	[slug] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_email_unique]    Script Date: 22-Nov-19 10:30:58 PM ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_email_unique] ON [dbo].[users]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Campana] ADD  CONSTRAINT [dfCampanaFechaFinal]  DEFAULT (NULL) FOR [fechaFinal]
GO
ALTER TABLE [dbo].[Campana] ADD  CONSTRAINT [dfCampanaIdEmpleadoAprobador]  DEFAULT ((0)) FOR [idEmpleadoAprobador]
GO
ALTER TABLE [dbo].[Cliente] ADD  CONSTRAINT [dfClienteApellido2]  DEFAULT ('No indica') FOR [apellido2]
GO
ALTER TABLE [dbo].[Cliente] ADD  CONSTRAINT [dfClienteOtroTelefono]  DEFAULT ('No indica') FOR [otroTelefono]
GO
ALTER TABLE [dbo].[Cliente] ADD  CONSTRAINT [dfClienteIngresoSalarial]  DEFAULT ((0.00)) FOR [ingresoSalarial]
GO
ALTER TABLE [dbo].[Cliente] ADD  CONSTRAINT [dfClienteDireccionExacta]  DEFAULT ('No indica') FOR [direccionExacta]
GO
ALTER TABLE [dbo].[Empleado] ADD  CONSTRAINT [dfEmpleadoApellido2]  DEFAULT ('No indica') FOR [apellido2]
GO
ALTER TABLE [dbo].[Empleado] ADD  CONSTRAINT [dfEmpleadoOtroTelefono]  DEFAULT ('No indica') FOR [otroTelefono]
GO
ALTER TABLE [dbo].[Vehiculo] ADD  CONSTRAINT [dfVehiculoFechaSalida]  DEFAULT (NULL) FOR [fechaSalida]
GO
ALTER TABLE [dbo].[Bitacora]  WITH CHECK ADD  CONSTRAINT [fkBitacoraUsuarioCreacion] FOREIGN KEY([idUsuarioCreacion])
REFERENCES [dbo].[Usuario] ([idUsuario])
GO
ALTER TABLE [dbo].[Bitacora] CHECK CONSTRAINT [fkBitacoraUsuarioCreacion]
GO
ALTER TABLE [dbo].[Bitacora]  WITH CHECK ADD  CONSTRAINT [fkBitacoraUsuarioModificacion] FOREIGN KEY([idUsuarioModificacion])
REFERENCES [dbo].[Usuario] ([idUsuario])
GO
ALTER TABLE [dbo].[Bitacora] CHECK CONSTRAINT [fkBitacoraUsuarioModificacion]
GO
ALTER TABLE [dbo].[Campana]  WITH CHECK ADD  CONSTRAINT [fkCampanaCanton] FOREIGN KEY([idCanton], [idProvincia])
REFERENCES [dbo].[Canton] ([idCanton], [idProvincia])
GO
ALTER TABLE [dbo].[Campana] CHECK CONSTRAINT [fkCampanaCanton]
GO
ALTER TABLE [dbo].[Campana]  WITH CHECK ADD  CONSTRAINT [fkCampanaEmpleadoAprobador] FOREIGN KEY([idEmpleadoAprobador])
REFERENCES [dbo].[Empleado] ([idEmpleado])
GO
ALTER TABLE [dbo].[Campana] CHECK CONSTRAINT [fkCampanaEmpleadoAprobador]
GO
ALTER TABLE [dbo].[Campana]  WITH CHECK ADD  CONSTRAINT [fkCampanaEmpleadoCreador] FOREIGN KEY([idEmpleadoCreador])
REFERENCES [dbo].[Empleado] ([idEmpleado])
GO
ALTER TABLE [dbo].[Campana] CHECK CONSTRAINT [fkCampanaEmpleadoCreador]
GO
ALTER TABLE [dbo].[Campana]  WITH CHECK ADD  CONSTRAINT [fkCampanaEstadoCampana] FOREIGN KEY([idEstadoCampana])
REFERENCES [dbo].[EstadoCampana] ([idEstadoCampana])
GO
ALTER TABLE [dbo].[Campana] CHECK CONSTRAINT [fkCampanaEstadoCampana]
GO
ALTER TABLE [dbo].[Campana]  WITH CHECK ADD  CONSTRAINT [fkCampanaSede] FOREIGN KEY([idSede])
REFERENCES [dbo].[Sede] ([idSede])
GO
ALTER TABLE [dbo].[Campana] CHECK CONSTRAINT [fkCampanaSede]
GO
ALTER TABLE [dbo].[Campana]  WITH CHECK ADD  CONSTRAINT [fkCampanaTipoCampana] FOREIGN KEY([idTipoCampana])
REFERENCES [dbo].[TipoCampana] ([idTipoCampana])
GO
ALTER TABLE [dbo].[Campana] CHECK CONSTRAINT [fkCampanaTipoCampana]
GO
ALTER TABLE [dbo].[Canton]  WITH CHECK ADD  CONSTRAINT [fkCantonProvincia] FOREIGN KEY([idProvincia])
REFERENCES [dbo].[Provincia] ([idProvincia])
GO
ALTER TABLE [dbo].[Canton] CHECK CONSTRAINT [fkCantonProvincia]
GO
ALTER TABLE [dbo].[Cliente]  WITH CHECK ADD  CONSTRAINT [fkClienteDistrito] FOREIGN KEY([idDistrito], [idCanton], [idProvincia])
REFERENCES [dbo].[Distrito] ([idDistrito], [idCanton], [idProvincia])
GO
ALTER TABLE [dbo].[Cliente] CHECK CONSTRAINT [fkClienteDistrito]
GO
ALTER TABLE [dbo].[Cliente]  WITH CHECK ADD  CONSTRAINT [fkClienteEstadoCliente] FOREIGN KEY([idEstadoCliente])
REFERENCES [dbo].[EstadoCliente] ([idEstadoCliente])
GO
ALTER TABLE [dbo].[Cliente] CHECK CONSTRAINT [fkClienteEstadoCliente]
GO
ALTER TABLE [dbo].[Cliente]  WITH CHECK ADD  CONSTRAINT [fkClienteGenero] FOREIGN KEY([idGenero])
REFERENCES [dbo].[Genero] ([idGenero])
GO
ALTER TABLE [dbo].[Cliente] CHECK CONSTRAINT [fkClienteGenero]
GO
ALTER TABLE [dbo].[Cliente]  WITH CHECK ADD  CONSTRAINT [fkClienteOcupacion] FOREIGN KEY([idOcupacion])
REFERENCES [dbo].[Ocupacion] ([idOcupacion])
GO
ALTER TABLE [dbo].[Cliente] CHECK CONSTRAINT [fkClienteOcupacion]
GO
ALTER TABLE [dbo].[Cliente]  WITH CHECK ADD  CONSTRAINT [fkClienteTipoCliente] FOREIGN KEY([idTipoCliente])
REFERENCES [dbo].[TipoCliente] ([idTipoCliente])
GO
ALTER TABLE [dbo].[Cliente] CHECK CONSTRAINT [fkClienteTipoCliente]
GO
ALTER TABLE [dbo].[Cliente]  WITH CHECK ADD  CONSTRAINT [fkClienteVehiculo] FOREIGN KEY([idVehiculoInteres])
REFERENCES [dbo].[Vehiculo] ([idVehiculo])
GO
ALTER TABLE [dbo].[Cliente] CHECK CONSTRAINT [fkClienteVehiculo]
GO
ALTER TABLE [dbo].[Departamento]  WITH CHECK ADD  CONSTRAINT [fkDepartamentoSede] FOREIGN KEY([idSede])
REFERENCES [dbo].[Sede] ([idSede])
GO
ALTER TABLE [dbo].[Departamento] CHECK CONSTRAINT [fkDepartamentoSede]
GO
ALTER TABLE [dbo].[DetalleCotizacion]  WITH CHECK ADD  CONSTRAINT [fkDetalleCotizacionEncabezadoCotizacion] FOREIGN KEY([idEncabezadoCotizacion])
REFERENCES [dbo].[EncabezadoCotizacion] ([idEncabezadoCotizacion])
GO
ALTER TABLE [dbo].[DetalleCotizacion] CHECK CONSTRAINT [fkDetalleCotizacionEncabezadoCotizacion]
GO
ALTER TABLE [dbo].[DetalleCotizacion]  WITH CHECK ADD  CONSTRAINT [fkDetalleCotizacionVehiculo] FOREIGN KEY([idVehiculo])
REFERENCES [dbo].[Vehiculo] ([idVehiculo])
GO
ALTER TABLE [dbo].[DetalleCotizacion] CHECK CONSTRAINT [fkDetalleCotizacionVehiculo]
GO
ALTER TABLE [dbo].[Distrito]  WITH CHECK ADD  CONSTRAINT [fkCantonDistrito] FOREIGN KEY([idCanton], [idProvincia])
REFERENCES [dbo].[Canton] ([idCanton], [idProvincia])
GO
ALTER TABLE [dbo].[Distrito] CHECK CONSTRAINT [fkCantonDistrito]
GO
ALTER TABLE [dbo].[Empleado]  WITH CHECK ADD  CONSTRAINT [fkEmpleadoDepartamento] FOREIGN KEY([idDepartamento], [idSede])
REFERENCES [dbo].[Departamento] ([idDepartamento], [idSede])
GO
ALTER TABLE [dbo].[Empleado] CHECK CONSTRAINT [fkEmpleadoDepartamento]
GO
ALTER TABLE [dbo].[Empleado]  WITH CHECK ADD  CONSTRAINT [fkEmpleadoDistrito] FOREIGN KEY([idDistrito], [idCanton], [idProvincia])
REFERENCES [dbo].[Distrito] ([idDistrito], [idCanton], [idProvincia])
GO
ALTER TABLE [dbo].[Empleado] CHECK CONSTRAINT [fkEmpleadoDistrito]
GO
ALTER TABLE [dbo].[Empleado]  WITH CHECK ADD  CONSTRAINT [fkEmpleadoEstadoEmpleado] FOREIGN KEY([idEstadoEmpleado])
REFERENCES [dbo].[EstadoEmpleado] ([idEstadoEmpleado])
GO
ALTER TABLE [dbo].[Empleado] CHECK CONSTRAINT [fkEmpleadoEstadoEmpleado]
GO
ALTER TABLE [dbo].[Empleado]  WITH CHECK ADD  CONSTRAINT [fkEmpleadoGenero] FOREIGN KEY([idGenero])
REFERENCES [dbo].[Genero] ([idGenero])
GO
ALTER TABLE [dbo].[Empleado] CHECK CONSTRAINT [fkEmpleadoGenero]
GO
ALTER TABLE [dbo].[Empleado]  WITH CHECK ADD  CONSTRAINT [fkEmpleadoUsuario] FOREIGN KEY([idUsuario])
REFERENCES [dbo].[Usuario] ([idUsuario])
GO
ALTER TABLE [dbo].[Empleado] CHECK CONSTRAINT [fkEmpleadoUsuario]
GO
ALTER TABLE [dbo].[EncabezadoCotizacion]  WITH CHECK ADD  CONSTRAINT [fkEncabezadoCotizacionCampana] FOREIGN KEY([idCampana])
REFERENCES [dbo].[Campana] ([idCampana])
GO
ALTER TABLE [dbo].[EncabezadoCotizacion] CHECK CONSTRAINT [fkEncabezadoCotizacionCampana]
GO
ALTER TABLE [dbo].[EncabezadoCotizacion]  WITH CHECK ADD  CONSTRAINT [fkEncabezadoCotizacionCliente] FOREIGN KEY([idCliente])
REFERENCES [dbo].[Cliente] ([idCliente])
GO
ALTER TABLE [dbo].[EncabezadoCotizacion] CHECK CONSTRAINT [fkEncabezadoCotizacionCliente]
GO
ALTER TABLE [dbo].[EncabezadoCotizacion]  WITH CHECK ADD  CONSTRAINT [fkEncabezadoCotizacionEmpleado] FOREIGN KEY([idEmpleado])
REFERENCES [dbo].[Empleado] ([idEmpleado])
GO
ALTER TABLE [dbo].[EncabezadoCotizacion] CHECK CONSTRAINT [fkEncabezadoCotizacionEmpleado]
GO
ALTER TABLE [dbo].[EncabezadoCotizacion]  WITH CHECK ADD  CONSTRAINT [fkEncabezadoCotizacionEstadoCotizacion] FOREIGN KEY([idEstadoCotizacion])
REFERENCES [dbo].[EstadoCotizacion] ([idEstadoCotizacion])
GO
ALTER TABLE [dbo].[EncabezadoCotizacion] CHECK CONSTRAINT [fkEncabezadoCotizacionEstadoCotizacion]
GO
ALTER TABLE [dbo].[permission_role]  WITH CHECK ADD  CONSTRAINT [permission_role_permission_id_foreign] FOREIGN KEY([permission_id])
REFERENCES [dbo].[permissions] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[permission_role] CHECK CONSTRAINT [permission_role_permission_id_foreign]
GO
ALTER TABLE [dbo].[permission_role]  WITH CHECK ADD  CONSTRAINT [permission_role_role_id_foreign] FOREIGN KEY([role_id])
REFERENCES [dbo].[roles] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[permission_role] CHECK CONSTRAINT [permission_role_role_id_foreign]
GO
ALTER TABLE [dbo].[permission_user]  WITH CHECK ADD  CONSTRAINT [permission_user_permission_id_foreign] FOREIGN KEY([permission_id])
REFERENCES [dbo].[permissions] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[permission_user] CHECK CONSTRAINT [permission_user_permission_id_foreign]
GO
ALTER TABLE [dbo].[permission_user]  WITH CHECK ADD  CONSTRAINT [permission_user_user_id_foreign] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[permission_user] CHECK CONSTRAINT [permission_user_user_id_foreign]
GO
ALTER TABLE [dbo].[Proveedor]  WITH CHECK ADD  CONSTRAINT [fkProveedorEstadoProveedor] FOREIGN KEY([idEstadoProveedor])
REFERENCES [dbo].[EstadoProveedor] ([idEstadoProveedor])
GO
ALTER TABLE [dbo].[Proveedor] CHECK CONSTRAINT [fkProveedorEstadoProveedor]
GO
ALTER TABLE [dbo].[role_user]  WITH CHECK ADD  CONSTRAINT [role_user_role_id_foreign] FOREIGN KEY([role_id])
REFERENCES [dbo].[roles] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[role_user] CHECK CONSTRAINT [role_user_role_id_foreign]
GO
ALTER TABLE [dbo].[role_user]  WITH CHECK ADD  CONSTRAINT [role_user_user_id_foreign] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[role_user] CHECK CONSTRAINT [role_user_user_id_foreign]
GO
ALTER TABLE [dbo].[Sede]  WITH CHECK ADD  CONSTRAINT [fkSedeDistrito] FOREIGN KEY([idDistrito], [idCanton], [idProvincia])
REFERENCES [dbo].[Distrito] ([idDistrito], [idCanton], [idProvincia])
GO
ALTER TABLE [dbo].[Sede] CHECK CONSTRAINT [fkSedeDistrito]
GO
ALTER TABLE [dbo].[Sede]  WITH CHECK ADD  CONSTRAINT [fkSedeEstadoSede] FOREIGN KEY([idEstadoSede])
REFERENCES [dbo].[EstadoSede] ([idEstadoSede])
GO
ALTER TABLE [dbo].[Sede] CHECK CONSTRAINT [fkSedeEstadoSede]
GO
ALTER TABLE [dbo].[Usuario]  WITH CHECK ADD  CONSTRAINT [fkUsuarioEstadoUsuario] FOREIGN KEY([idEstadoUsuario])
REFERENCES [dbo].[EstadoUsuario] ([idEstadoUsuario])
GO
ALTER TABLE [dbo].[Usuario] CHECK CONSTRAINT [fkUsuarioEstadoUsuario]
GO
ALTER TABLE [dbo].[Vehiculo]  WITH CHECK ADD  CONSTRAINT [fkVehiculoProveedor] FOREIGN KEY([idProveedor])
REFERENCES [dbo].[Proveedor] ([idProveedor])
GO
ALTER TABLE [dbo].[Vehiculo] CHECK CONSTRAINT [fkVehiculoProveedor]
GO
ALTER TABLE [dbo].[Vehiculo]  WITH CHECK ADD  CONSTRAINT [fkVehiculoTipoVehiculo] FOREIGN KEY([idTipoVehiculo])
REFERENCES [dbo].[TipoVehiculo] ([idTipoVehiculo])
GO
ALTER TABLE [dbo].[Vehiculo] CHECK CONSTRAINT [fkVehiculoTipoVehiculo]
GO
ALTER TABLE [dbo].[roles]  WITH CHECK ADD CHECK  (([special]=N'no-access' OR [special]=N'all-access'))
GO
USE [master]
GO
ALTER DATABASE [RMClient] SET  READ_WRITE 
GO
