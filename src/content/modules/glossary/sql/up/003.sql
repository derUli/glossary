ALTER TABLE `{prefix}glossary_term`
  ADD CONSTRAINT fk_glossary_id
  FOREIGN KEY (glossary_id)
  REFERENCES `{prefix}glossary`(id)
  ON DELETE CASCADE;
