/****** Object:  Database [systemNotes]    Script Date: 03/09/2020 22:14:28 ******/
CREATE DATABASE [systemNotes]  (EDITION = 'Standard', SERVICE_OBJECTIVE = 'S0', MAXSIZE = 250 GB) WITH CATALOG_COLLATION = SQL_Latin1_General_CP1_CI_AS;
GO
ALTER DATABASE [systemNotes] SET COMPATIBILITY_LEVEL = 150
GO
ALTER DATABASE [systemNotes] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [systemNotes] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [systemNotes] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [systemNotes] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [systemNotes] SET ARITHABORT OFF 
GO
ALTER DATABASE [systemNotes] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [systemNotes] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [systemNotes] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [systemNotes] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [systemNotes] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [systemNotes] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [systemNotes] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [systemNotes] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [systemNotes] SET ALLOW_SNAPSHOT_ISOLATION ON 
GO
ALTER DATABASE [systemNotes] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [systemNotes] SET READ_COMMITTED_SNAPSHOT ON 
GO
ALTER DATABASE [systemNotes] SET  MULTI_USER 
GO
ALTER DATABASE [systemNotes] SET ENCRYPTION ON
GO
ALTER DATABASE [systemNotes] SET QUERY_STORE = ON
GO
ALTER DATABASE [systemNotes] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 100, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
/****** Object:  Table [dbo].[capacities]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[capacities](
	[idCapacity] [int] IDENTITY(1,1) NOT NULL,
	[idLevel] [int] NULL,
	[idGrade] [int] NULL,
	[idCourse] [int] NULL,
	[descriptionCapacity] [varchar](70) NOT NULL,
	[abbreviation] [varchar](30) NULL,
	[orderCapacity] [int] NULL,
	[idPeriod] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idCapacity] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[courses]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[courses](
	[idCourse] [int] IDENTITY(1,1) NOT NULL,
	[codeCourse] [varchar](4) NOT NULL,
	[descriptionCourse] [varchar](50) NOT NULL,
	[idLevel] [int] NULL,
	[idGrade] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idCourse] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[codeCourse] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[grades]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[grades](
	[idGrade] [int] IDENTITY(1,1) NOT NULL,
	[descriptionGrade] [varchar](40) NOT NULL,
	[idLevel] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idGrade] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[levels]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[levels](
	[idLevel] [int] IDENTITY(1,1) NOT NULL,
	[descriptionLevel] [varchar](20) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idLevel] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[notes]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[notes](
	[idNotes] [int] IDENTITY(1,1) NOT NULL,
	[codeStudent] [char](10) NULL,
	[codeWorker] [char](4) NULL,
	[idLevel] [int] NULL,
	[idGrade] [int] NULL,
	[idSection] [int] NULL,
	[idCourse] [int] NULL,
	[idCapacity] [int] NULL,
	[note1] [decimal](5, 2) NULL,
	[note2] [decimal](5, 2) NULL,
	[note3] [decimal](5, 2) NULL,
	[average] [decimal](5, 2) NULL,
	[idperiod] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idNotes] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[periodsYear]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[periodsYear](
	[idPeriod] [int] IDENTITY(1,1) NOT NULL,
	[yearPeriod] [int] NOT NULL,
	[bimester] [varchar](15) NULL,
PRIMARY KEY CLUSTERED 
(
	[idPeriod] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[roles]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[roles](
	[idRole] [int] IDENTITY(1,1) NOT NULL,
	[roleName] [varchar](255) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idRole] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sections]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sections](
	[idSection] [int] IDENTITY(1,1) NOT NULL,
	[descriptionSection] [char](1) NOT NULL,
	[idGrade] [int] NULL,
	[idLevel] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idSection] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[students]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[students](
	[codeStudent] [char](10) NOT NULL,
	[nameStudent] [varchar](30) NOT NULL,
	[lastNameStudent] [varchar](30) NOT NULL,
	[dniStudent] [char](8) NOT NULL,
	[codeWorker] [char](4) NULL,
	[idLevel] [int] NULL,
	[idGrade] [int] NULL,
	[idSection] [int] NULL,
	[idPeriod] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[codeStudent] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[codeStudent] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[dniStudent] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[teachers]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[teachers](
	[codeWorker] [char](4) NULL,
	[codeTeacher] [char](4) NOT NULL,
	[idCourse] [int] NULL,
	[idGrade] [int] NULL,
	[idSection] [int] NULL,
	[idLevel] [int] NULL,
	[idPeriod] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[codeTeacher] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[codeTeacher] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[idUser] [int] IDENTITY(1,1) NOT NULL,
	[nameUser] [varchar](30) NOT NULL,
	[school] [varchar](50) NOT NULL,
	[password] [varchar](255) NOT NULL,
	[idRole] [int] NULL,
	[remember_token] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[workers]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[workers](
	[codeWorker] [char](4) NOT NULL,
	[nameWorker] [varchar](30) NOT NULL,
	[lastNameWorker] [varchar](30) NOT NULL,
	[dniWorker] [char](8) NOT NULL,
	[addressWorker] [varchar](40) NULL,
	[civilStatus] [varchar](15) NULL,
	[telephone] [varchar](10) NULL,
	[socialSecurity] [varchar](10) NULL,
	[flatWorker] [varchar](40) NULL,
	[dateWorker] [date] NULL,
	[statusWorker] [bit] NULL,
	[idUser] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[codeWorker] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[codeWorker] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[dniWorker] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[workers] ADD  DEFAULT ((1)) FOR [statusWorker]
GO
ALTER TABLE [dbo].[capacities]  WITH CHECK ADD FOREIGN KEY([idCourse])
REFERENCES [dbo].[courses] ([idCourse])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[capacities]  WITH CHECK ADD FOREIGN KEY([idGrade])
REFERENCES [dbo].[grades] ([idGrade])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[capacities]  WITH CHECK ADD FOREIGN KEY([idLevel])
REFERENCES [dbo].[levels] ([idLevel])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[capacities]  WITH CHECK ADD FOREIGN KEY([idPeriod])
REFERENCES [dbo].[periodsYear] ([idPeriod])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[courses]  WITH CHECK ADD FOREIGN KEY([idGrade])
REFERENCES [dbo].[grades] ([idGrade])
GO
ALTER TABLE [dbo].[courses]  WITH CHECK ADD FOREIGN KEY([idLevel])
REFERENCES [dbo].[levels] ([idLevel])
GO
ALTER TABLE [dbo].[grades]  WITH CHECK ADD FOREIGN KEY([idLevel])
REFERENCES [dbo].[levels] ([idLevel])
GO
ALTER TABLE [dbo].[notes]  WITH CHECK ADD FOREIGN KEY([codeStudent])
REFERENCES [dbo].[students] ([codeStudent])
GO
ALTER TABLE [dbo].[notes]  WITH CHECK ADD FOREIGN KEY([codeWorker])
REFERENCES [dbo].[workers] ([codeWorker])
GO
ALTER TABLE [dbo].[notes]  WITH CHECK ADD FOREIGN KEY([idCapacity])
REFERENCES [dbo].[capacities] ([idCapacity])
GO
ALTER TABLE [dbo].[notes]  WITH CHECK ADD FOREIGN KEY([idCourse])
REFERENCES [dbo].[courses] ([idCourse])
GO
ALTER TABLE [dbo].[notes]  WITH CHECK ADD FOREIGN KEY([idGrade])
REFERENCES [dbo].[grades] ([idGrade])
GO
ALTER TABLE [dbo].[notes]  WITH CHECK ADD FOREIGN KEY([idLevel])
REFERENCES [dbo].[levels] ([idLevel])
GO
ALTER TABLE [dbo].[notes]  WITH CHECK ADD FOREIGN KEY([idperiod])
REFERENCES [dbo].[periodsYear] ([idPeriod])
GO
ALTER TABLE [dbo].[notes]  WITH CHECK ADD FOREIGN KEY([idSection])
REFERENCES [dbo].[sections] ([idSection])
GO
ALTER TABLE [dbo].[sections]  WITH CHECK ADD FOREIGN KEY([idGrade])
REFERENCES [dbo].[grades] ([idGrade])
GO
ALTER TABLE [dbo].[sections]  WITH CHECK ADD FOREIGN KEY([idLevel])
REFERENCES [dbo].[levels] ([idLevel])
GO
ALTER TABLE [dbo].[students]  WITH CHECK ADD FOREIGN KEY([codeWorker])
REFERENCES [dbo].[workers] ([codeWorker])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[students]  WITH CHECK ADD FOREIGN KEY([idGrade])
REFERENCES [dbo].[grades] ([idGrade])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[students]  WITH CHECK ADD FOREIGN KEY([idLevel])
REFERENCES [dbo].[levels] ([idLevel])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[students]  WITH CHECK ADD FOREIGN KEY([idPeriod])
REFERENCES [dbo].[periodsYear] ([idPeriod])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[students]  WITH CHECK ADD FOREIGN KEY([idSection])
REFERENCES [dbo].[sections] ([idSection])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[teachers]  WITH CHECK ADD FOREIGN KEY([codeWorker])
REFERENCES [dbo].[workers] ([codeWorker])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[teachers]  WITH CHECK ADD FOREIGN KEY([idCourse])
REFERENCES [dbo].[courses] ([idCourse])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[teachers]  WITH CHECK ADD FOREIGN KEY([idGrade])
REFERENCES [dbo].[grades] ([idGrade])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[teachers]  WITH CHECK ADD FOREIGN KEY([idLevel])
REFERENCES [dbo].[levels] ([idLevel])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[teachers]  WITH CHECK ADD FOREIGN KEY([idPeriod])
REFERENCES [dbo].[periodsYear] ([idPeriod])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[teachers]  WITH CHECK ADD FOREIGN KEY([idSection])
REFERENCES [dbo].[sections] ([idSection])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[users]  WITH CHECK ADD FOREIGN KEY([idRole])
REFERENCES [dbo].[roles] ([idRole])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[workers]  WITH CHECK ADD FOREIGN KEY([idUser])
REFERENCES [dbo].[users] ([idUser])
GO
ALTER TABLE [dbo].[periodsYear]  WITH CHECK ADD CHECK  (([bimester]='IV Bimestre' OR [bimester]='III Bimestre' OR [bimester]='II Bimestre' OR [bimester]='I Bimestre'))
GO
ALTER TABLE [dbo].[workers]  WITH CHECK ADD CHECK  (([civilStatus]='Divorciado(a)' OR [civilStatus]='Viudo(a)' OR [civilStatus]='Casado(a)' OR [civilStatus]='Soltero(a)'))
GO
ALTER TABLE [dbo].[workers]  WITH CHECK ADD CHECK  (([socialSecurity]='MINSA' OR [socialSecurity]='EsSalud'))
GO
/****** Object:  StoredProcedure [dbo].[sprole]    Script Date: 03/09/2020 22:14:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[sprole] as
SELECT * FROM roles where idRole >= 2 order by idRole;
GO
ALTER DATABASE [systemNotes] SET  READ_WRITE 
GO
