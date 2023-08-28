#
# Add SQL definition of database tables
#
--
-- Table structure for table 'tt_content'
--
CREATE TABLE tt_content (
    tx_ucph_content_dropdown_item int(11) unsigned DEFAULT '0',
    tx_ucph_content_dropdown_btn varchar(255) DEFAULT '' NOT NULL
);

--
-- Table structure for table 'tx_ucph_content_dropdown_item'
--
CREATE TABLE tx_ucph_content_dropdown_item (
    tt_content int(11) unsigned DEFAULT '0',
    tx_ucph_content_dropdown_item_link varchar(255) DEFAULT '' NOT NULL,
    tx_ucph_content_dropdown_item_text varchar(255) DEFAULT '' NOT NULL
);