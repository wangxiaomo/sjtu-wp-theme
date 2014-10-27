<?php
/*
 Template Name: Intro
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		//get the default page settings
		$subtitle=get_post_meta( $post->ID, 'subtitle_value', true );
		$slider=get_post_meta( $post->ID, 'slider_value', $single = true );
		$slider_prefix=get_post_meta( $post->ID, 'slider_name_value', true );
		if ( $slider_prefix=='default' ) {
			$slider_prefix='';
		}
		$layout=get_post_meta( $post->ID, 'layout_value', true );
		if ( $layout=='' ) {
			$layout='right';
		}
		$show_title=get_opt( '_show_page_title' );
		$sidebar=get_post_meta( $post->ID, 'sidebar_value', $single = true );
		if ( $sidebar=='' ) {
			$sidebar='default';
		}
?>

<div id="content-container" class="content-gradient <?php echo $layoutclass; ?> ">
<div id="<?php echo $content_id; ?>">

	<!--content-->
    <?php
		if ( $show_title!='off' ) {?>
    	<h1 class="page-heading"></h1><hr/>
    <?php }

		the_content();
	}
}

?>

	<div class="global-intro">
		<h2 class="intro-title">上海交通大学全球传播研究院</h2>
		<p>上海交通大学全球传播研究院成立于2007年4月28日，当天隆重举行了“2007首届全球传播论坛开幕式暨上海交通大学全球传播研究院成立仪式”，上海交通大学党委书记、校务委员会主任马德秀，与上海市委宣传部副部长张止静（代表王仲伟部长），为研究院的成立共同揭牌。</p>
		<p>概况如下：</p>
		<p>一、团队建设</p>
		<p>研究院现有专职研究人员26人。其中，教授16人、博士生导师14人、教育部“跨世纪优秀人才”1人、“新世纪优秀人才”2人、“长江学者”讲座教授1人、上海“千人计划”1人，博士比例达80%，海外博士比例达25%。其整体实力，跻身国内同行前列。</p>
		<p>研究院还建立了由一批海外、境外著名传播学者组成的国际学术委员会，指导研究院的建设。成员如下：</p>
		<p>帕翠斯（美国普渡大学教授、原国际传播学会会长）</p>
		<p>帕夫利克（美国西北大学教授、原哥伦比亚大学新媒体研究中心主任）</p>
		<p>达顿（英国牛津大学教授、原新媒体研究中心主任）</p>
		<p>吉见俊哉（日本东京大学社会信息学环教授、原环长）</p>
		<p>郭振羽（新加坡南洋理工大学教授、新加坡新媒体研究中心主任）</p>
		<p>苏钥机（香港中文大学教授、原新闻与传播学院院长）</p>
		<p>萨瓦斯（香港城市大学教授、英语与传播系主任）</p>
		<p>二、研究成果</p>
		<p>仅专职人员，历年来的主要成果如下（截止2013年）。</p>
		<p>主持各类项目80多个，总经费计1200多万元。包括：纵向项目34个（其中，国家级项目16个、省部级项目18个），计300多万元；横向项目50多个，计800多万元。</p>
		<p>发表论文300多篇。包括：SSCI论文10篇、CSSCI以上论文220多篇、顶尖国际会议论文30多篇。其中：国际大众传播研究学会（IAMCR）论文2篇、国际传播学会（ICA论文）15篇、美国传播学会（NCA）论文3篇。一个研究团队，如此高密度地发表顶尖国际会议论文，为国内同行少见。</p>
		<p>出版著作80多部。包括：专著：30多部、教材20多部、论文集20多部。其中，包括国家社科项目成果、教育部人文社科二等奖获奖成果、教育部重大项目成果等。</p>
		<p>三、学术论坛</p>
		<p>从2007年起，为扩大影响、积聚力量、吸引人才，创办“全球传播论坛”，以国际化、前沿化、规范化、学科交叉化、产学研一体化为宗旨，迄今连续举办2007、2008、2009、2010、2012共五届，逐步形成国内同类论坛中的一个学术品牌，在海内外产生了广泛影响。尤其是2012年5月，以“中国新媒体传播与互联网社区”为主题，在美国凤凰城召开的第五届全球传播论坛暨国际传播学会（ICA）年度大会专题论坛，为中国新闻传播学界第一次走出国门、到国际顶级学术平台举办论坛，意义重大。</p>
		<p>来自美、英、加、法、德、日、韩、新加坡、台湾、香港、澳门等国家和地区的学界权威、业界领袖、师生代表，逾千人次，先后出席论坛致辞、演讲以及发表研究论文。</p>
		<p>其重要影响，集中体现为三点：</p>
		<p>一、特色鲜明。以全球化、新媒体为关键词，聚焦学术前沿，引领时代潮流，具有很强的号召力、吸引力。</p>
		<p>二、主流汇集。在上海交大传播学科日益发展、欣欣向荣的态势下，多位大师、名家欣然与会，尤其是国际传播学大师麦考姆斯教授，在国内诸多传播学术论坛中，迄今只参加了上海交大“全球传播论坛”并担任大会主席。同时，从第二届论坛开始，研究院即与世界传播学界顶尖学术团体“国际传播学会”（ICA）*，以及世界百强名校美国普渡大学传播学院、世界著名商学院哥本哈根商学院跨文化传播与管理系，持续合作办会，此举在国内也属首创。</p>
		<p>不仅如此，由于研究院与ICA建立了良好的高度互信关系，ICA授权上海交大，联合全国（包括港澳台）19家主要新闻传播院系，于2013年11月8-10日共同举办区域性大会，这是ICA在中国首次召开大会，具有历史性意义，圆满成功，受到新华社、人民网、新浪网、上海广播电视台、解放日报、文汇报等多家主流媒体报道。</p>
		<p>三、产学研结合。从一开始，研究院就秉持一个信念：贯通学界和业界，拆除两者之间的藩篱。为此，每届论坛都专设“产业”专场，邀请业界名流与学界精英对话，形成良性互动。</p>
		<p>基于以上努力和成绩，近几年来，上海交通大学的新闻传播学科发展迅速，声名鹊起，在2012年教育部学科评估中，进入全国十强，同时，在2012、2014、2015年三次世界大学（QS）学科评估中，连续进入世界百强（全国仅有二家院校）。</p>
		<p>————————</p>
		<p>*国际传播学会（International Communication Association），英文缩写为：ICA。成立于1950年，是当今世界传播学领域里最有影响力的学术团体，在80多个国家里，拥有5000多名会员，并且，是联合国的合作伙伴，受到各国新闻传播学界和社会各界乃至政府首脑的重视，例如，它2012年在韩国举办年度大会之际，金大中总统亲自出席开幕式并致辞。为此，各国传播学界都十分重视与它的交流和合作。</p>
		<p>作为一个世界性的学术团体，ICA政治立场中立，对华态度友好。它每年召开一次年度大会，三年在美国，一年在其他国家，每次与会人员达到数千人，被公认为世界传播学领域里水平最高、影响最大的学术盛会。同时，它根据实际情况，不定期地与各国学者合作，举办区域性大会，其规模一般为数百人，仅次于年度大会。</p>
	</div>
</div>

<div class="clear"></div>
  </div>
<?php
get_footer();
?>
