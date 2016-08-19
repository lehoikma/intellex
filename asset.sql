--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: admins; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE admins (
    id integer NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    deleted timestamp without time zone,
    email character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    name character varying(50) DEFAULT ''::character varying,
    last_login timestamp without time zone
);


ALTER TABLE public.admins OWNER TO postgres;

--
-- Name: TABLE admins; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE admins IS '管理者情報';


--
-- Name: COLUMN admins.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN admins.id IS 'ID';


--
-- Name: COLUMN admins.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN admins.created IS '登録日時';


--
-- Name: COLUMN admins.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN admins.modified IS '更新日時';


--
-- Name: COLUMN admins.deleted; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN admins.deleted IS '削除日付';


--
-- Name: COLUMN admins.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN admins.email IS 'メールアドレス';


--
-- Name: COLUMN admins.password; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN admins.password IS 'パスワード';


--
-- Name: COLUMN admins.name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN admins.name IS '名前';


--
-- Name: COLUMN admins.last_login; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN admins.last_login IS '最終ログイン日時';


--
-- Name: admins_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE admins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.admins_id_seq OWNER TO postgres;

--
-- Name: admins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE admins_id_seq OWNED BY admins.id;


--
-- Name: doc_requests; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE doc_requests (
    id integer NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    deleted timestamp without time zone,
    user_id integer,
    quantity integer,
    know_from text,
    other text,
    extra_data text
);


ALTER TABLE public.doc_requests OWNER TO postgres;

--
-- Name: TABLE doc_requests; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE doc_requests IS '資料請求情報';


--
-- Name: COLUMN doc_requests.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.id IS 'ID';


--
-- Name: COLUMN doc_requests.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.created IS '登録日時';


--
-- Name: COLUMN doc_requests.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.modified IS '更新日時';


--
-- Name: COLUMN doc_requests.deleted; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.deleted IS '削除日付';


--
-- Name: COLUMN doc_requests.user_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.user_id IS 'ユーザーID';


--
-- Name: COLUMN doc_requests.quantity; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.quantity IS '購入口数';


--
-- Name: COLUMN doc_requests.know_from; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.know_from IS '知った経緯';


--
-- Name: COLUMN doc_requests.other; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.other IS 'その他';


--
-- Name: COLUMN doc_requests.extra_data; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN doc_requests.extra_data IS '登録時のローデータ';


--
-- Name: doc_requests_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE doc_requests_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.doc_requests_id_seq OWNER TO postgres;

--
-- Name: doc_requests_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE doc_requests_id_seq OWNED BY doc_requests.id;


--
-- Name: seminar_speaker_relations; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE seminar_speaker_relations (
    id integer NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    seminar_id integer,
    speaker_id integer
);


ALTER TABLE public.seminar_speaker_relations OWNER TO postgres;

--
-- Name: TABLE seminar_speaker_relations; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE seminar_speaker_relations IS 'セミナーと講師のリレーションテーブル';


--
-- Name: COLUMN seminar_speaker_relations.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_speaker_relations.id IS 'ID';


--
-- Name: COLUMN seminar_speaker_relations.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_speaker_relations.created IS '登録日時';


--
-- Name: COLUMN seminar_speaker_relations.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_speaker_relations.modified IS '更新日時';


--
-- Name: COLUMN seminar_speaker_relations.seminar_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_speaker_relations.seminar_id IS 'セミナーID';


--
-- Name: COLUMN seminar_speaker_relations.speaker_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_speaker_relations.speaker_id IS '講師ID';


--
-- Name: seminar_speaker_relations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seminar_speaker_relations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seminar_speaker_relations_id_seq OWNER TO postgres;

--
-- Name: seminar_speaker_relations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE seminar_speaker_relations_id_seq OWNED BY seminar_speaker_relations.id;


--
-- Name: seminar_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seminar_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seminar_types_id_seq OWNER TO postgres;

--
-- Name: seminar_types; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE seminar_types (
    id integer DEFAULT nextval('seminar_types_id_seq'::regclass) NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    name character varying(255) NOT NULL
);


ALTER TABLE public.seminar_types OWNER TO postgres;

--
-- Name: TABLE seminar_types; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE seminar_types IS 'セミナー種別テーブル';


--
-- Name: COLUMN seminar_types.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_types.id IS 'ID';


--
-- Name: COLUMN seminar_types.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_types.created IS '作成日時';


--
-- Name: COLUMN seminar_types.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_types.modified IS '更新日時';


--
-- Name: COLUMN seminar_types.name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_types.name IS '種別名';


--
-- Name: seminar_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seminar_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seminar_type_id_seq OWNER TO postgres;

--
-- Name: seminar_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE seminar_type_id_seq OWNED BY seminar_types.id;


--
-- Name: seminar_type_relations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seminar_type_relations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seminar_type_relations_id_seq OWNER TO postgres;

--
-- Name: seminar_type_relations; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE seminar_type_relations (
    id integer DEFAULT nextval('seminar_type_relations_id_seq'::regclass) NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    seminar_id integer,
    seminar_type_id integer
);


ALTER TABLE public.seminar_type_relations OWNER TO postgres;

--
-- Name: TABLE seminar_type_relations; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE seminar_type_relations IS 'セミナーとセミナー種別のリレーションテーブル';


--
-- Name: COLUMN seminar_type_relations.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_type_relations.id IS 'ID';


--
-- Name: COLUMN seminar_type_relations.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_type_relations.created IS '登録日時';


--
-- Name: COLUMN seminar_type_relations.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_type_relations.modified IS '更新日時';


--
-- Name: COLUMN seminar_type_relations.seminar_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_type_relations.seminar_id IS 'セミナーID';


--
-- Name: COLUMN seminar_type_relations.seminar_type_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_type_relations.seminar_type_id IS 'セミナータイプID';


--
-- Name: seminar_type_relations_id_seq1; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seminar_type_relations_id_seq1
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seminar_type_relations_id_seq1 OWNER TO postgres;

--
-- Name: seminar_type_relations_id_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE seminar_type_relations_id_seq1 OWNED BY seminar_type_relations.id;


--
-- Name: seminar_users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE seminar_users (
    id integer NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    seminar_id integer,
    user_id bigint,
    attendees smallint,
    status smallint DEFAULT 1,
    extra_data text,
    additional_info text
);


ALTER TABLE public.seminar_users OWNER TO postgres;

--
-- Name: TABLE seminar_users; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE seminar_users IS 'セミナー参加者';


--
-- Name: COLUMN seminar_users.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.id IS 'ID';


--
-- Name: COLUMN seminar_users.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.created IS '登録日付';


--
-- Name: COLUMN seminar_users.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.modified IS '更新日付';


--
-- Name: COLUMN seminar_users.seminar_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.seminar_id IS 'セミナーID';


--
-- Name: COLUMN seminar_users.user_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.user_id IS 'ユーザーID';


--
-- Name: COLUMN seminar_users.attendees; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.attendees IS '同伴者数';


--
-- Name: COLUMN seminar_users.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.status IS '参加ステータス 1: 出席予定 2: 出席済み 3: 欠席';


--
-- Name: COLUMN seminar_users.extra_data; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.extra_data IS '登録時のローデータ';


--
-- Name: COLUMN seminar_users.additional_info; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminar_users.additional_info IS 'その他';


--
-- Name: seminar_users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seminar_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seminar_users_id_seq OWNER TO postgres;

--
-- Name: seminar_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE seminar_users_id_seq OWNED BY seminar_users.id;


--
-- Name: seminars; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE seminars (
    id integer NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    deleted timestamp without time zone,
    title character varying(255) NOT NULL,
    description text,
    publish_from timestamp without time zone NOT NULL,
    publish_to timestamp without time zone NOT NULL,
    capacity integer NOT NULL,
    capacity_alert_num integer NOT NULL,
    venue character varying(300) NOT NULL,
    image character varying(255),
    status smallint NOT NULL,
    contact character varying(255),
    entry_fee character varying(50),
    open_from timestamp without time zone NOT NULL,
    open_to timestamp without time zone NOT NULL,
    access character varying(500),
    management_code character varying(50),
    open_door_at time without time zone
);


ALTER TABLE public.seminars OWNER TO postgres;

--
-- Name: TABLE seminars; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE seminars IS 'セミナー';


--
-- Name: COLUMN seminars.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.id IS 'ID';


--
-- Name: COLUMN seminars.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.created IS '登録日時';


--
-- Name: COLUMN seminars.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.modified IS '更新日時';


--
-- Name: COLUMN seminars.deleted; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.deleted IS '削除日時';


--
-- Name: COLUMN seminars.title; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.title IS 'タイトル';


--
-- Name: COLUMN seminars.description; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.description IS '詳細 HTMLタグ有効';


--
-- Name: COLUMN seminars.publish_from; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.publish_from IS '募集開始日時';


--
-- Name: COLUMN seminars.publish_to; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.publish_to IS '募集終了日時';


--
-- Name: COLUMN seminars.capacity; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.capacity IS '席数';


--
-- Name: COLUMN seminars.capacity_alert_num; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.capacity_alert_num IS '空席アラートを出す数';


--
-- Name: COLUMN seminars.venue; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.venue IS 'セミナー会場';


--
-- Name: COLUMN seminars.image; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.image IS 'セミナー画像パス';


--
-- Name: COLUMN seminars.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.status IS 'セミナーステータス 1: 下書き 2: 公開';


--
-- Name: COLUMN seminars.contact; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.contact IS '当日のお問い合わせ';


--
-- Name: COLUMN seminars.entry_fee; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.entry_fee IS '参加費';


--
-- Name: COLUMN seminars.open_from; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.open_from IS 'セミナー終了日時';


--
-- Name: COLUMN seminars.open_to; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.open_to IS 'セミナー開始日時';


--
-- Name: COLUMN seminars.access; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.access IS 'アクセス';


--
-- Name: COLUMN seminars.management_code; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.management_code IS '社内管理コード';


--
-- Name: COLUMN seminars.open_door_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN seminars.open_door_at IS '開場日時';


--
-- Name: seminars_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seminars_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.seminars_id_seq OWNER TO postgres;

--
-- Name: seminars_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE seminars_id_seq OWNED BY seminars.id;


--
-- Name: speakers; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE speakers (
    id integer NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    deleted timestamp without time zone,
    name character varying(70),
    introduction character varying(500),
    image character varying(255)
);


ALTER TABLE public.speakers OWNER TO postgres;

--
-- Name: TABLE speakers; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE speakers IS '講師';


--
-- Name: COLUMN speakers.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN speakers.id IS 'ID';


--
-- Name: COLUMN speakers.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN speakers.created IS '登録日時';


--
-- Name: COLUMN speakers.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN speakers.modified IS '更新日時';


--
-- Name: COLUMN speakers.deleted; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN speakers.deleted IS '削除日時';


--
-- Name: COLUMN speakers.name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN speakers.name IS '講師名';


--
-- Name: COLUMN speakers.introduction; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN speakers.introduction IS '詳細 HTMLタグ有効';


--
-- Name: COLUMN speakers.image; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN speakers.image IS '講師画像パス';


--
-- Name: speakers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE speakers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.speakers_id_seq OWNER TO postgres;

--
-- Name: speakers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE speakers_id_seq OWNED BY speakers.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id bigint NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    deleted timestamp without time zone,
    customer_id character varying(100),
    name_sei character varying(100) NOT NULL,
    name_mei character varying(100) NOT NULL,
    name_sei_kana character varying(100),
    name_mei_kana character varying(100),
    company_name character varying(100),
    sex smallint,
    birthday date,
    email character varying(255) DEFAULT ''::character varying NOT NULL,
    tel character varying(50),
    withdraw_flg smallint DEFAULT 0,
    optin smallint DEFAULT 1,
    memo text,
    postal_code character varying(30),
    address1 character varying(100),
    address2 character varying(255),
    address3 character varying(255)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: TABLE users; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE users IS 'ユーザー';


--
-- Name: COLUMN users.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.id IS 'ID';


--
-- Name: COLUMN users.created; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.created IS '登録日時';


--
-- Name: COLUMN users.modified; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.modified IS '更新日時';


--
-- Name: COLUMN users.deleted; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.deleted IS '削除日時';


--
-- Name: COLUMN users.customer_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.customer_id IS '顧客管理ID';


--
-- Name: COLUMN users.name_sei; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.name_sei IS '姓';


--
-- Name: COLUMN users.name_mei; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.name_mei IS '名';


--
-- Name: COLUMN users.name_sei_kana; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.name_sei_kana IS '姓（フリガナ）';


--
-- Name: COLUMN users.name_mei_kana; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.name_mei_kana IS '名（フリガナ）';


--
-- Name: COLUMN users.company_name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.company_name IS '法人名';


--
-- Name: COLUMN users.sex; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.sex IS '性別 1: 男 2: 女';


--
-- Name: COLUMN users.birthday; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.birthday IS '生年月日';


--
-- Name: COLUMN users.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.email IS 'メールアドレス';


--
-- Name: COLUMN users.tel; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.tel IS '電話番号';


--
-- Name: COLUMN users.withdraw_flg; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.withdraw_flg IS '退会フラグ 1:退会';


--
-- Name: COLUMN users.optin; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.optin IS 'オプトイン';


--
-- Name: COLUMN users.memo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.memo IS 'メモ';


--
-- Name: COLUMN users.postal_code; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.postal_code IS '郵便番号';


--
-- Name: COLUMN users.address1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.address1 IS '住所1';


--
-- Name: COLUMN users.address2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.address2 IS '住所2';


--
-- Name: COLUMN users.address3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN users.address3 IS '住所3';


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY admins ALTER COLUMN id SET DEFAULT nextval('admins_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY doc_requests ALTER COLUMN id SET DEFAULT nextval('doc_requests_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminar_speaker_relations ALTER COLUMN id SET DEFAULT nextval('seminar_speaker_relations_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminar_users ALTER COLUMN id SET DEFAULT nextval('seminar_users_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminars ALTER COLUMN id SET DEFAULT nextval('seminars_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY speakers ALTER COLUMN id SET DEFAULT nextval('speakers_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Name: admins_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY admins
    ADD CONSTRAINT admins_pkey PRIMARY KEY (id);


--
-- Name: doc_requests_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY doc_requests
    ADD CONSTRAINT doc_requests_pkey PRIMARY KEY (id);


--
-- Name: seminar_speaker_relations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seminar_speaker_relations
    ADD CONSTRAINT seminar_speaker_relations_pkey PRIMARY KEY (id);


--
-- Name: seminar_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seminar_types
    ADD CONSTRAINT seminar_type_pkey PRIMARY KEY (id);


--
-- Name: seminar_type_relations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seminar_type_relations
    ADD CONSTRAINT seminar_type_relations_pkey PRIMARY KEY (id);


--
-- Name: seminar_users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seminar_users
    ADD CONSTRAINT seminar_users_pkey PRIMARY KEY (id);


--
-- Name: seminars_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seminars
    ADD CONSTRAINT seminars_pkey PRIMARY KEY (id);


--
-- Name: speakers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY speakers
    ADD CONSTRAINT speakers_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: fk_seminar_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminar_speaker_relations
    ADD CONSTRAINT fk_seminar_id FOREIGN KEY (seminar_id) REFERENCES seminars(id);


--
-- Name: fk_seminar_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminar_type_relations
    ADD CONSTRAINT fk_seminar_id FOREIGN KEY (seminar_id) REFERENCES seminars(id);


--
-- Name: fk_seminar_type_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminar_type_relations
    ADD CONSTRAINT fk_seminar_type_id FOREIGN KEY (seminar_type_id) REFERENCES seminar_types(id);


--
-- Name: fk_seminar_user_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminar_users
    ADD CONSTRAINT fk_seminar_user_id FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: fk_seminar_user_sm_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminar_users
    ADD CONSTRAINT fk_seminar_user_sm_id FOREIGN KEY (seminar_id) REFERENCES seminars(id);


--
-- Name: fk_speaker_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seminar_speaker_relations
    ADD CONSTRAINT fk_speaker_id FOREIGN KEY (speaker_id) REFERENCES speakers(id);


--
-- Name: fk_user_request; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY doc_requests
    ADD CONSTRAINT fk_user_request FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

