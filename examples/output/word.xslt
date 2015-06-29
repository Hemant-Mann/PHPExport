<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<w:document mc:Ignorable="w14 w15 wp14" xmlns:m="http://schemas.openxmlformats.org/officeDocument/2006/math" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main" xmlns:w10="urn:schemas-microsoft-com:office:word" xmlns:w14="http://schemas.microsoft.com/office/word/2010/wordml" xmlns:w15="http://schemas.microsoft.com/office/word/2012/wordml" xmlns:wne="http://schemas.microsoft.com/office/word/2006/wordml" xmlns:wp="http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing" xmlns:wp14="http://schemas.microsoft.com/office/word/2010/wordprocessingDrawing" xmlns:wpc="http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas" xmlns:wpg="http://schemas.microsoft.com/office/word/2010/wordprocessingGroup" xmlns:wpi="http://schemas.microsoft.com/office/word/2010/wordprocessingInk" xmlns:wps="http://schemas.microsoft.com/office/word/2010/wordprocessingShape">
	<w:body>
		<w:p w:rsidP="00A247A6" w:rsidR="008C5FD4" w:rsidRDefault="003F3CCD">
			<w:pPr>
				<w:pStyle w:val="Heading1"/>
			</w:pPr>
			<w:r>
				<w:t xml:space="preserve">Products </w:t>
			</w:r>
			<w:bookmarkStart w:id="0" w:name="_GoBack"/>
			<w:bookmarkEnd w:id="0"/>
			<w:r w:rsidR="00CF26A3">
				<w:t>for</w:t>
			</w:r>
			<w:r>
				<w:t xml:space="preserve">Sale</w:t>
			</w:r>
		</w:p>
		<xsl:for-each select="root/row">
		<w:p w:rsidP="00A247A6" w:rsidR="00A247A6" w:rsidRDefault="003F3CCD">
			<w:pPr>
				<w:pStyle w:val="Heading2"/>
			</w:pPr>
			<w:r>
				<w:t><xsl:value-of select="name"/></w:t>
			</w:r>
		</w:p>
		<w:p w:rsidP="003F3CCD" w:rsidR="003F3CCD" w:rsidRDefault="003F3CCD" w:rsidRPr="003F3CCD">
			<w:pPr>
				<w:pStyle w:val="Heading3"/>
			</w:pPr>
			<w:r>
				<w:t>Category: <xsl:value-of select="category"/></w:t>
			</w:r>
		</w:p>
		<w:p w:rsidP="00A247A6" w:rsidR="00A247A6" w:rsidRDefault="00A247A6">
			<w:r>
				<w:rPr>
					<w:noProof/>
					<w:lang w:val="en-US"/>
				</w:rPr>
				<w:drawing>
					<wp:anchor allowOverlap="1" behindDoc="0" distB="0" distL="114300" distR="114300" distT="0" layoutInCell="1" locked="0" relativeHeight="251658240" simplePos="0">
						<wp:simplePos x="0" y="0"/>
						<wp:positionH relativeFrom="column">
							<wp:posOffset>0</wp:posOffset>
						</wp:positionH>
						<wp:positionV relativeFrom="paragraph">
							<wp:posOffset>3810</wp:posOffset>
						</wp:positionV>
						<wp:extent cx="1409700" cy="1409700"/>
						<wp:effectExtent b="0" l="0" r="0" t="0"/>
						<wp:wrapSquare wrapText="bothSides"/>
						<wp:docPr id="1" name="Picture 1"/>
						<wp:cNvGraphicFramePr>
							<a:graphicFrameLocks noChangeAspect="1" xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main"/>
						</wp:cNvGraphicFramePr>
						<a:graphic xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main">
							<a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture">
								<pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">
									<pic:nvPicPr>
										<pic:cNvPr id="1" name="200_arrangement_94972439.jpg"/>
										<pic:cNvPicPr/>
									</pic:nvPicPr>
									<pic:blipFill>
										<a:blip cstate="print" r:embed="rId6">
											<a:extLst>
												<a:ext uri="">
													<a14:useLocalDpi val="0" xmlns:a14="http://schemas.microsoft.com/office/drawing/2010/main"/>
												</a:ext>
											</a:extLst>
										</a:blip>
										<a:stretch>
											<a:fillRect/>
										</a:stretch>
									</pic:blipFill>
									<pic:spPr>
										<a:xfrm>
											<a:off x="0" y="0"/>
											<a:ext cx="1409700" cy="1409700"/>
										</a:xfrm>
										<a:prstGeom prst="rect">
											<a:avLst/>
										</a:prstGeom>
									</pic:spPr>
								</pic:pic>
							</a:graphicData>
						</a:graphic>
					</wp:anchor>
				</w:drawing>
			</w:r>
			<w:r>
				<w:rPr>
					<w:b/>
					<w:sz w:val="28"/>
					<w:szCs w:val="28"/>
				</w:rPr>
				<w:t>Rs. <xsl:value-of select="price"/></w:t>
			</w:r>
		</w:p>
		<xsl:for-each select="description/p">
		<w:p w:rsidP="00A247A6" w:rsidR="00A247A6" w:rsidRDefault="00A247A6">
			<w:r>
				<w:t><xsl:value-of select="."/></w:t>
			</w:r>
		</w:p>
		</xsl:for-each>
		<w:p w:rsidP="00A247A6" w:rsidR="00A247A6" w:rsidRDefault="00102631">
			<w:r>
				<w:pict>
					<v:rect fillcolor="#a0a0a0" id="_x0000_i1025" o:hr="t" o:hralign="center" o:hrstd="t" stroked="f" style="width:0;height:1.5pt"/>
				</w:pict>
			</w:r>
		</w:p>
		</xsl:for-each>
		<w:p w:rsidP="00A247A6" w:rsidR="00A247A6" w:rsidRDefault="00A247A6" w:rsidRPr="00A247A6"/>
		<w:sectPr w:rsidR="00A247A6" w:rsidRPr="00A247A6">
			<w:headerReference r:id="rId7" w:type="default"/>
			<w:footerReference r:id="rId8" w:type="default"/>
			<w:pgSz w:h="16838" w:w="11906"/>
			<w:pgMar w:bottom="1440" w:footer="708" w:gutter="0" w:header="708" w:left="1440" w:right="1440" w:top="1440"/>
			<w:cols w:space="708"/>
			<w:docGrid w:linePitch="360"/>
		</w:sectPr>
	</w:body>
</w:document>
</xsl:template>
</xsl:stylesheet>